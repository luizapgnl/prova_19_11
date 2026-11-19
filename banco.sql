CREATE  DATABASE IF NOT EXISTS empresa;
USE: empresa;

CREATE TABLE funcionarios(
    ID INTO AUTO INCREMENT PRIMARY KEY,
    Nome VARCHAR (100) NOT NULL,
    Cargo VARCHAR(50) NOT NULL,
    Salário DECIMAL (10,2),

    data_admissao DATE
);

<?php
$host = "localhost";
$dbname= "empresa";
$usuario = "root";
$senha = "";
$charset - "utf7mb4";

tru{
    $pdo = new PDO{
        "mysql: host=$host;dbname = $dbname;charset=$charset";
        $usuario,
        $senha;

    $pdo->setAttribute(PDO::ATTR.ERRMODE, PDO::ERRMODE.EXCEPTION);
}cath(PDOEXCEPTION $e){
    die("Erro na conexão: " $e =>getMessage[]);
}
}
?>