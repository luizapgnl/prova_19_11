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
                $feedback = ['tipo' => 'erro', 'mensagem' => 'Operador registrado na sessão'];
            } else{
                $feedback = ['tipo' => 'erro', 'mensagem' => 'Informe um nome para o operador'];
            }
        }elseif($acao === 'encerrar_sessao'){
            unset($SESSION['operador']);
            $feedback = ['tipo' => 'erro', 'mensagem' => 'Sessão do operador encontrada'];

        }elseif($acao === 'cadastrar'){
            $feedback = $controller ->cadastrar($_POST);

    }elseif($acao === 'confirmar exclusao'){
        $idExcluir = isset($_POST['id'])? (int) $_POST['id']: 0;
    $feedback= $controller ->excluir($idExcluir);
}
    }

    if($_SERVER['REQUEST_METHOD']=== 'GET' && isset($_GET['excluir'])){
        $idSolicitado = (int)$_GET['excluir'];
        $funcionarioParaExcluir = $controller->buscarPorld($idSolicitado);
        if($funcionarioParaExcluir === null){
            $feedback = ['tipo' => 'erro', 'mensagem' => 'Funcionário não encontrado'];

        }
    }
    $funcionarios = $controller->listar();
}catch (PDOException $e){
    
} 

?>