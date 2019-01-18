<?php
/**
 * Author: R.j
 * Date: 2019-01-14 20:23
 * File: Encrypt.php
 */

namespace App\Supports;


class Crypt {

    /**
     * @param string $plaintext
     * @param string $secret
     * @return string
     */
    public static function encrypt($plaintext, $secret) {
        $cipher         = "AES-128-CBC";
        $ivlen          = openssl_cipher_iv_length("AES-128-CBC");
        $iv             = openssl_random_pseudo_bytes($ivlen);
        $ciphertext_raw = openssl_encrypt($plaintext, $cipher, $secret, $options = OPENSSL_RAW_DATA, $iv);
        return base64_encode($iv . $ciphertext_raw);
    }

    /**
     * @param string $ciphertext
     * @param string $secret
     * @return bool|string
     */
    public static function decrypt($ciphertext, $secret) {
        $c              = base64_decode($ciphertext);
        $ivlen          = openssl_cipher_iv_length($cipher = "AES-128-CBC");
        $iv             = substr($c, 0, $ivlen);
        $ciphertext_raw = substr($c, $ivlen);
        return openssl_decrypt($ciphertext_raw, $cipher, $secret, $options = OPENSSL_RAW_DATA, $iv);
    }

    /**
     * @param int    $length
     * @param string $prefix
     * @return string
     */
    public static function generate(int $length = 10, $prefix = '') {
        return $prefix . base64_encode(openssl_random_pseudo_bytes($length));
    }

    /**
     * @return string
     */
    public static function uniqid() {
        return uniqid();
    }

}