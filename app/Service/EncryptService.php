<?php

namespace App\Service;

class EncryptService {

    public $key;

    public function getKey() {
        return $this->key = config('aes.key');
    }

    public function getEncryptFlag() {
        return $this->key = config('aes.flag');
    }

    function encrypt($string) {
        $key = $this->getKey();
        $cipher = "AES-256-CBC";
        $ivlen = openssl_cipher_iv_length($cipher);
        $iv = openssl_random_pseudo_bytes($ivlen);
        $ciphertext = openssl_encrypt($string, $cipher, $key, OPENSSL_RAW_DATA, $iv);
        $hmac = hash_hmac('sha256', $ciphertext, $key, true);
        return base64_encode($iv . $hmac . $ciphertext);
    }

    function decrypt($string) {
        $key = $this->getKey();
        $cipher = "AES-256-CBC";
        $c = base64_decode($string);
        $ivlen = openssl_cipher_iv_length($cipher);
        $iv = substr($c, 0, $ivlen);
        $hmac = substr($c, $ivlen, $sha2len = 32);
        $ciphertext = substr($c, $ivlen + $sha2len);
        $original_plaintext = openssl_decrypt($ciphertext, $cipher, $key, OPENSSL_RAW_DATA, $iv);
        $calcmac = hash_hmac('sha256', $ciphertext, $key, true);
        if (hash_equals($hmac, $calcmac)) {
            return $original_plaintext;
        }
        return false;
    }

    function injectEnc($string) {
        if ($this->getEncryptFlag()) {
            return $this->encrypt($string);
        }
        return $string;
    }
}
