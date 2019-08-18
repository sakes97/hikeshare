<?php

class Util
{
    public function __construct()
    {}

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
        session_destroy();
    }
#endregion

#region Generators
    public static function generate_userid(){}
#endregion

#region
#endregion

}
