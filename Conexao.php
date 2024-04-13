<?php

class Conexao {
    public function conectaDB(){
        try {
            $conn = new PDO("mysql:host=localhost;dbname=anote", "root", "");
            echo "Banco conectado com sucesso!";
            return $conn;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}