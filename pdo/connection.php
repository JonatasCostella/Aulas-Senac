<?php

require_once 'config.php';
class connection {

    public static function getConnection($host, $dbname, $username, $password) {
        $dsn = "mysql:host=$host;dbname=$dbname;charset=UTF8";

        try {
            $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
            return new PDO($dsn, $username, $password, $options);
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

}

return connection::getConnection($host, $dbname, $username, $password);

?>