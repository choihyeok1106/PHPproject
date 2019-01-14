<?php
/**
 * Author: R.j
 * Date: 2019-01-14 20:23
 * File: Encrypt.php
 */

namespace App\Supports;


class Encrypt {

    /**
     * @param string $plaintext
     * @param string $secret
     * @return string
     */
    public static function encode($plaintext, $secret) {
        $ivlen          = openssl_cipher_iv_length($cipher = "AES-128-CBC");
        $iv             = openssl_random_pseudo_bytes($ivlen);
        $ciphertext_raw = openssl_encrypt($plaintext, $cipher, $secret, $options = OPENSSL_RAW_DATA, $iv);
        $hmac           = hash_hmac('sha256', $ciphertext_raw, $secret, $as_binary = true);
        return base64_encode($iv . $hmac . $ciphertext_raw);
    }

    /**
     * @param string $ciphertext
     * @param string $secret
     * @return bool|string
     */
    public static function decode($ciphertext, $secret) {
        $c                  = base64_decode($ciphertext);
        $ivlen              = openssl_cipher_iv_length($cipher = "AES-128-CBC");
        $iv                 = substr($c, 0, $ivlen);
        $hmac               = substr($c, $ivlen, $sha2len = 32);
        $ciphertext_raw     = substr($c, $ivlen + $sha2len);
        $original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $secret, $options = OPENSSL_RAW_DATA, $iv);
        $calcmac            = hash_hmac('sha256', $ciphertext_raw, $secret, $as_binary = true);
        if (hash_equals($hmac, $calcmac)) { //PHP 5.6+ timing attack safe comparison
            return $original_plaintext;
        } else {
            return '';
        }
    }

    /**
     * @param string $prefix
     * @return string
     */
    public static function generate($prefix = '') {
        $str       = 'A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z';
        $alphabet  = explode(',', $str);
        $yearIndex = date('Y') % 26;
        $yearCode  = $alphabet[$yearIndex];
        $monthCode = $alphabet[date('n') * rand(1, 2)];
        $day       = date('j');
        if ($day < 10) {
            $dayCode = $day;
        } else {
            $dayCode = $alphabet[$day - 10];
        }
        $hourCode  = $alphabet[intval(date('H'))];
        $timeCode  = date('is');
        $microCode = intval((microtime(true) - strtotime(date('YmdHis'))) * 10000);
        return $prefix . base64_encode($prefix . $yearCode . $monthCode . $dayCode . $hourCode . $timeCode . $microCode);
    }

}