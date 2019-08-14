<?php

// class Database extends PDO
// {
//     public function __construct()
//     {
//         parent::__construct(
//             DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME,
//             DB_USERNAME, DB_PASSWORD
//         );
//     }
// }

class Database
{
    //Hold an instance of the PDO class
    private static $conn;
    private static $dsn = DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME;
    private static $username = DB_USERNAME;
    private static $password = DB_PASSWORD;

    //Private constructor to prevent direct creation of object
    private function _construct()
    {}

    //Return an instantialised database handler object
    public static function GetConnection()
    {
        //Create a database connection only if one doesn't already exist
        if (!isset(self::$conn)) {
            try {
                self::$conn = new PDO(self::$dsn,
                    self::$username,
                    self::$password);
            } catch (PDOException $e) {
                self::Close();
                $error_message = $e->getMessage();
                echo $error_message;

                exit();
            }

        }
        return self::$conn;
    } //End GetConnectioon()

    //Method that closes the database connection
    public static function Close()
    {
        self::$conn = null;
    } //End Close()

    /*
    Execute() method to call when executing INSERT,UPDATE,DELETE
    This method is a wrapper for the PDOStatement::execute() method
    */
    public static function Execute($sql, $params = null)
    {
        try {
            //Get connection
            $pdo_conn = self::GetConnection();
            //Prepare query for execution
            $statement = $pdo_conn->prepare($sql);
            //Execute statement
            $statement->execute($params);
        } catch (PDOException $e) {
            self::Close();
            $error_message = $e->getMessage();
            echo $error_message;

            exit();
        }
    }

    /*
    The GetAll() method is a wrapper for the PDOStatement::fetchall().
    This method will be used for retrieving a complete result set from a
    SELECT query. 
    
    FETCH_ASSOC tells PDO to return the result as an associative array.

    */
    public static function GetAll($sql, $params = null, $fetchStyle = PDO::FETCH_ASSOC)
    {
        $result = null;
        try {
            $pdo_conn = self::GetConnection();
            $statement = $pdo_conn->prepare($sql);
            $statement->execute($params);
            $result = $statement->fetchall($fetchStyle);
        } catch (PDOException $e) {
            self::Close();
            $error_message = $e->getMessage();
            echo $error_message;

            exit();
        }
        return $result;
    }

    /*
    This GetRow() method is a wrapper for the PDOStatement::fetch().
    This method will be used for retrieving a single row from a SELECT
    query.
    */
    public static function GetRow($sql, $params = null, $fetchStyle = PDO::FETCH_ASSOC)
    {
        $result = null;
        try {
            $pdo_conn = self::GetConnection();
            $statement = $pdo_conn->prepare($sql);
            $statement->execute($params);
            $result = $statement->fetch($fetchStyle);
        } catch (PDOException $e) {
            self::Close();
            $error_message = $e->getMessage();
            echo $error_message;

            exit();
        }
        return $result;
    }
}
