<?php
session_start(): 
require_once__DIR.'/controllers/FuncionarioController.php';
$feedback = null;
$funcionarioParaExcluir = null;

try{
    $controller = new FuncionarioController();
    if($_SERVER['REQUEST_METHOD']=== 'POST'){
        if ($acao === 'definir_operador'){
            $operador =trim(string) ($_POST['operador']??"");
            if($operador !==""){
                $SESSION['operador'] = $operador;
                $feedback = ['tipo' => 'erro', 'mensagem' => ]
            }
        }
    }
}

?>