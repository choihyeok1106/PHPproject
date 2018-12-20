<?php
/**
 * Author: R.j
 * Date: 2018-12-11 16:19
 * File: AuthenticateService.php
 */

namespace App\Services;


class AuthenticateService
{

    /**
     * @param string $username
     * @param string $password
     * @return Service
     */
    public static function login(string $username, string $password)
    {
        return Service::make()->post('/v1/vbo/authorize',
            [
                'parameters' => [
                    "username" => $username,
                    "password" => md5($password),
                    "validity_period_hours" => env('API_EXPIRE_DAYS', 1)
                ]
            ]);
    }

    /**
     * @param string $passport
     * @param string $number
     * @return Service
     */
    public static function refresh(string $passport, string $number)
    {
        return Service::make([
            'X-Passport' => $passport,
            'X-Passport-Identity' => $number,
            'X-Passport-Period' => env('API_EXPIRE_DAYS', 1)
        ])->post('/v1/vbo/authorize/refresh');
    }

}