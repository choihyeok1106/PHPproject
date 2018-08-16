<?php
/**
 * Created by PhpStorm.
 * User: yoonpooh
 * Date: 2018. 6. 19.
 * Time: PM 2:09
 */

namespace App\Supports;

class RestClient
{
    public $url;
    public $parameters;
    public $method;

    public $options = [
        'headers' => [],
        'parameters' => [],
        'curl_options' => [

        ],
        'build_indexed_queries' => FALSE,
        'user_agent' => "PHP RestClient/0.1.7",
        'base_url' => APIResources::BASE_URL,
        'format' => NULL,
        'format_regex' => "/(\w+)\/(\w+)(;[.+])?/",
        'decoders' => [
            'json' => 'json_decode',
            'php' => 'unserialize'
        ],

        'username' => '{dev-admin}',
        'password' => '{940CA68C46C14E2961CE751E66098F9E5252BBB7$2Y$10$CG47CAKHOMXINXESG5NAEETWG90YWI6DL}'
    ];

    public $handle;
    public $response;
    public $headers;
    public $info;
    public $error;
    public $response_status_lines;

    public $decoded_response; // Decoded response body.

    public function set_option($key, $value)
    {
        $this->options[$key] = $value;
    }

    public function execute($headers = [])
    {
        $client = clone $this;
        $client->url = $this->url;
        $client->handle = curl_init();
        $curlopt = [
            CURLOPT_HEADER => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_USERAGENT => $client->options['user_agent'],
            CURLOPT_SSL_VERIFYPEER => false
        ];

        if ($client->options['username'] && $client->options['password'])
            $curlopt[CURLOPT_USERPWD] = sprintf("%s:%s",
                $client->options['username'], $client->options['password']);

        if (count($client->options['headers']) || count($headers)) {
            $curlopt[CURLOPT_HTTPHEADER] = [];
            $headers = array_merge($client->options['headers'], $headers);
            foreach ($headers as $key => $values) {
                foreach (is_array($values) ? $values : [$values] as $value) {
                    $curlopt[CURLOPT_HTTPHEADER][] = sprintf("%s:%s", $key, $value);
                }
            }
        }

        if ($client->options['format'])
            $client->url .= '.' . $client->options['format'];

        if (is_array($this->parameters)) {
            $this->parameters = array_merge($client->options['parameters'], $this->parameters);
            $parameters_string = http_build_query($this->parameters);

            if (!$client->options['build_indexed_queries'])
                $parameters_string = preg_replace(
                    "/%5B[0-9]+%5D=/simU", "%5B%5D=", $parameters_string);
        } else
            $parameters_string = (string)$this->parameters;

        if (strtoupper($this->method) == 'POST') {
            $curlopt[CURLOPT_POST] = TRUE;
            $curlopt[CURLOPT_POSTFIELDS] = json_encode(['parameters' => $this->parameters]);
        } elseif (strtoupper($this->method) != 'GET') {
            $curlopt[CURLOPT_CUSTOMREQUEST] = strtoupper($this->method);
            $curlopt[CURLOPT_POSTFIELDS] = json_encode(['parameters' => $this->parameters]);
        } elseif ($parameters_string) {
            $client->url .= strpos($client->url, '?') ? '&' : '?';
            $client->url .= $parameters_string;
        }

        if ($client->options['base_url']) {
            if ($client->url[0] != '/' && substr($client->options['base_url'], -1) != '/')
                $client->url = '/' . $client->url;
            $client->url = $client->options['base_url'] . $client->url;
        }
        $curlopt[CURLOPT_URL] = $client->url;

        if ($client->options['curl_options']) {
            // array_merge would reset our numeric keys.
            foreach ($client->options['curl_options'] as $key => $value) {
                $curlopt[$key] = $value;
            }
        }
        curl_setopt_array($client->handle, $curlopt);

        $client->parse_response(curl_exec($client->handle));
        $client->info = (object)curl_getinfo($client->handle);
        $client->error = curl_error($client->handle);

        curl_close($client->handle);
        return $client;
    }

    public function parse_response($response)
    {
        $headers = [];
        $this->response_status_lines = [];
        $line = strtok($response, "\n");
        do {
            if (strlen(trim($line)) == 0) {
                // Since we tokenize on \n, use the remaining \r to detect empty lines.
                if (count($headers) > 0) break; // Must be the newline after headers, move on to response body
            } elseif (strpos($line, 'HTTP') === 0) {
                // One or more HTTP status lines
                $this->response_status_lines[] = trim($line);
            } else {
                // Has to be a header
                list($key, $value) = explode(':', $line, 2);
                $key = trim(strtolower(str_replace('-', '_', $key)));
                $value = trim($value);

                if (empty($headers[$key]))
                    $headers[$key] = $value;
                elseif (is_array($headers[$key]))
                    $headers[$key][] = $value;
                else
                    $headers[$key] = [$headers[$key], $value];
            }
        } while ($line = strtok("\n"));

        $this->headers = (object)$headers;
        $this->response = json_decode(strtok(""), true);
    }

    /**
     * @return RestClient
     */
    public function get()
    {
        $this->method = APIResources::GET;
        return $this->execute();
    }

    /**
     * @return RestClient
     */
    public function post()
    {
        $this->method = APIResources::POST;
        return $this->execute();
    }

    /**
     * @return RestClient
     */
    public function put()
    {
        $this->method = APIResources::PUT;
        return $this->execute();
    }

    public function patch()
    {
        $this->method = APIResources::PATCH;
        return $this->execute();
    }

    /**
     * @return RestClient
     */
    public function delete()
    {
        $this->method = APIResources::DELETE;
        return $this->execute();
    }
}


