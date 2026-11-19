<?php

class Conexao
{
    private static string $host = 'localhost';
    private static string $dbname = 'empresa_db';
    private static string $user = 'root';
    private static string $pass = '';

    public static function conectar(): PDO
    {
        $dsn = 'mysql:host=' . self::$host . ';dbname=' . self::$dbname . ';charset=utf8mb4';

        $pdo = new PDO($dsn, self::$user, self::$pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);

        return $pdo;
    }
}
?>