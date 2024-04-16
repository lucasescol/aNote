<?php

class Connection {
    public function connectDB()
    {
        try {
            $conn = new PDO("mysql:host=localhost;dbname=anote", "root", "");
            return $conn;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}