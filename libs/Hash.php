<?php 

class Hash
{
    /*
    @param string = $algo The algorithm (md5)
    @param string = $data The data to encode
    @param string = $salt Should be the same throughout the system
    @return string The hashed data/salt
    */
    public static function create($algo, $data, $salt)
    {
        $context = hash_init($algo, HASH_HMAC ,$salt);
        hash_update($context, $data);
        return hash_final($context);
    }
}