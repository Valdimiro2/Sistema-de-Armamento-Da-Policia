<?php

class DataBase
{
    public static function getConnection()
    {
        // Arquivo de conexão com o banco de dados MySQL
        $envPath = "env.ini";

        $env = parse_ini_file($envPath);

        $conn = new mysqli($env['host'], $env['user'], $env['password'], $env['dbname']);

        // Verificar se a conexão foi bem-sucedida
        if ($conn->connect_error) {
            die("Erro de conexão: " . $conn->connect_error);
        }

        return $conn;
    }


    public static function obterArmas()
    {
        $sql = "SELECT * FROM armas";
        $conn = self::getConnection();
        $result = $conn->query($sql);

        if ($result->num_rows < 0) {
            echo "<script>alert('Nao existem Registros');</script>";
            return null;
        } else {
            return $result;
        }
    }

    public static function obterOficiais()
    {
        $sql = "SELECT * FROM oficiais";
        $conn = self::getConnection();
        $result = $conn->query($sql);

        if ($result->num_rows < 0) {
            echo "<script>alert('Nao existem Registros');</script>";
            return null;
        } else {
            return $result;
        }
    }
}
