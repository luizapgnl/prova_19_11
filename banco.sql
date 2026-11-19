CREATE  DATABASE empresa_db;
USE empresa_db;

CREATE TABLE funcionarios(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR (100) NOT NULL,
    email VARCHAR (150) NOT NULL, 
    salario DECIMAL (10,2), NOT NULL,
    tipo VARCHAR (30) NOT NULL
);

<?php
$host="localhost";
$dbname"empresa";
$usuario="root";
$senha = "";
$charset = "utf8mb4";

try{
    $pdo = new pdo{
        "mysql: host = $host; dbname = dbname; charset-$charset";
        $usuario;
        $senha};
        $pdo ->setAttribute (PDO:: ATTR.ERRMODE, PDO::ERRMODE,EXCEPTION);
    
}cath (PDOException $e){
    die("Erro na conexão: " . $e->getMessage[1]);
}
?>