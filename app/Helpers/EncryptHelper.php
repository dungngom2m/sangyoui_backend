<?php

namespace App\Http\Helpers;

class EncryptHelper
{
    const JS_ENCRYPT = '-----BEGIN PUBLIC KEY-----
MIICIjANBgkqhkiG9w0BAQEFAAOCAg8AMIICCgKCAgEAs529gYx5WiGwzCgvz/+Z
7OZ2qR3Q1wUoNxCmlVI7u10TluRjg6MsB4M53Kfb6YhlOT1TSLh5k7y3hjb8qTwN
Vf9tIlILtSiSnb8ehpo9kgMW6K5AY8K1ofzZEiDb8L2O6tnW77EikC5+4IT792di
OPSeYYuWyLi22VxKvF08eDq/FRVUJ4dBdJTDrmd/n1OD5BFM7ymQagybpho2qf4i
lvM/XsZF0JJfjv3Wa5s1E4QKdKlYAOrGODVdPPNW6jLWAsgXMA1xVlTLRVRLT6o2
JbUXtXQVJM7LddAkbCoBJWDRec43hLhTC4Pr0Eyyp7t9L+/heLRLQRELNF+GxXQ2
Y/qnnaSRyTo+2tdCyaqsBp+HGNzqsnXH54+BtDOwFi1gxhI88eCgIQtT4+1sGlOQ
mXVtXxG2re6innKsu7J09snZmJM3yQQ9GRuwxN+TSDxrqU5zuZQ1XOu6MQEs0dp/
jecFw71N/YMVEPEYQhRLKuBBr74Cl8ct7KXPbZRVbpokVt8F5+vhhT4B9tKYPvFj
5f9CUrSyGFTR0lCxTLDBAhAHR39WbSbto5rKPNQZRT6tkzf8bKAFB4rMCJIcuJXd
v5K7HWOPpdr9DmfLyqr+rFfQD+P21lRy4EStuWO01XIDhjpY8cfhC1H9cMdgKqjc
vOfLaDDZFsg9AASKKrs9pRMCAwEAAQ==
-----END PUBLIC KEY-----';

    const JS_DECRYPT = '-----BEGIN PRIVATE KEY-----
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
ShcBQrSWrI6vSD/354AgeWzWjzM40r8=
-----END PRIVATE KEY-----';

    /**
     * Decrypt data
     *
     * @param string $encryptString
     *
     * @return bool|string
     */
    public static function privateDecrypt($encryptString = '')
    {
        $decrypted  = '';
        $privateKey = self::JS_DECRYPT;
        openssl_private_decrypt(base64_decode($encryptString), $decrypted, $privateKey);

        return $decrypted;
    }

    /**
     * Encryption data
     *
     * @param string $data
     *
     * @return bool|string
     */
    public static function publicEncrypt($data = '')
    {
        $encrypt_data = '';
        openssl_public_encrypt($data, $encrypt_data, self::JS_ENCRYPT);
        $encrypt_data = base64_encode($encrypt_data);

        return $encrypt_data;
    }
}
