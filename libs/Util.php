<?php

class Util
{
    public function __construct()
    { }

    #region Sessions
    public static function init_session()
    {
        @session_start();
    }

    public static function set_session($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get_session($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
    }

    public static function destroy_session()
    {
        session_unset();
        session_destroy();
    }

    public static function handleLogin()
    { }
    public static function handleLogout()
    { }
    #endregion

    #region Generators
    private function crypto_rand_secure($min, $max)
    {
        $range = $max - $min;
        if ($range < 1) {
            return $min;
        } // not so random...

        $log = ceil(log($range, 2));
        $bytes = (int) ($log / 8) + 1; // length in bytes
        $bits = (int) $log + 1; // length in bits
        $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter; // discard irrelevant bits
        } while ($rnd > $range);
        return $min + $rnd;
    }
    public static function generate_id($length = 11)
    {
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet .= "0123456789";
        $max = strlen($codeAlphabet);

        for ($i = 0; $i < $length; $i++) {
            $token .= $codeAlphabet[self::crypto_rand_secure(0, $max - 1)];
        }

        return $token;
    }
    #endregion

    #region Hash
    /*
    @param string = $algo The algorithm (md5)
    @param string = $data The data to encode
    @param string = $salt Should be the same throughout the system
    @return string The hashed data/salt
     */
    public static function create($algo, $data, $salt)
    {
        $context = hash_init($algo, HASH_HMAC, $salt);
        hash_update($context, $data);
        return hash_final($context);
    }
    #endregion

}
