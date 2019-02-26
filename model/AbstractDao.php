<?php


namespace model;
use PDO;
use PDOException;
class AbstractDao {
    const  DB_NAME = 'tehnomarket';
    const DB_HOST = '127.0.0.1';
    const DB_PORT = 3306;
    const DB_USERNAME = 'root';
    const DB_PASS = '';
    private static $db = null;

    /**
     * @return PDO|null
     */
    public static function getDb() {
        if (self::$db === null) {
            try {
                self::$db = new PDO ( "mysql:host=" . self::DB_HOST . ";dbname=" . self::DB_NAME, self::DB_USERNAME, self::DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                self::$db->exec("set names utf8");
                self::$db->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            }
            catch (PDOException $e) {
                throw new PDOException("DataBase dosn't work!");
            }
        }
        return self::$db;
    }

}