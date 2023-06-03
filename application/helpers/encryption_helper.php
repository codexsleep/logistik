<?php
function encrypt_str($string)
{
        $ciphering = "AES-128-CTR";
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;
        $key = '1234567891011121';
        $encryption_key = "tQtqK45waJYukPr6QfgNCrRg2398654";
        $encryption = openssl_encrypt($string, $ciphering, $encryption_key, $options, $key);

        return $encryption;
}

function decrypt_str($string)
{
        $ciphering = "AES-128-CTR";
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;
        $key = '1234567891011121';
        $encryption_key = "tQtqK45waJYukPr6QfgNCrRg2398654";
        $decryption = openssl_decrypt($string, $ciphering, $encryption_key, $options, $key);
        return $decryption;
}