<?php
session_start();

require_once __DIR__ . '/models/Funcionario_comum.php';

$feedback = null;
$funcionarioParaExcluir = null;

try {
    $controller = new Funcionario_comum();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $acao = $_POST['acao'] ?? '';

        if ($acao === 'definir_operador') {
            $operador = trim((string) ($_POST['operador'] ?? ''));
            if ($operador !== '') {
                $_SESSION['operador'] = $operador;
                $feedback = ['tipo' => 'sucesso', 'mensagem' => 'Operador registrado na sessão.'];
            } else {
                $feedback = ['tipo' => 'erro', 'mensagem' => 'Informe um nome para o operador.'];
            }
        } elseif ($acao === 'encerrar_sessao') {
            unset($_SESSION['operador']);
            $feedback = ['tipo' => 'sucesso', 'mensagem' => 'Sessão do operador encerrada.'];
        } elseif ($acao === 'cadastrar') {
            $feedback = $controller->cadastrar($_POST);
        } elseif ($acao === 'confirmar_exclusao') {
            $idExcluir = isset($_POST['id']) ? (int) $_POST['id'] : 0;
            $feedback = $controller->excluir($idExcluir);
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['excluir'])) {
        $idSolicitado = (int) $_GET['excluir'];
        $funcionarioParaExcluir = $controller->buscarPorId($idSolicitado);
        if ($funcionarioParaExcluir === null) {
            $feedback = ['tipo' => 'erro', 'mensagem' => 'Funcionário não encontrado.'];
        }
    }

    $funcionarios = $controller->listar();
} catch (PDOException $e) {
    $funcionarios = [];
    $feedback = ['tipo' => 'erro', 'mensagem' => 'Erro de banco de dados: ' . $e->getMessage()];
} catch (Throwable $e) {
    $funcionarios = [];
    $feedback = ['tipo' => 'erro', 'mensagem' => 'Erro inesperado: ' . $e->getMessage()];
}

$operadorAtual = $_SESSION['operador'] ?? null;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gerenciamento de Funcionários</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="topo">
        <div class="container topo-conteudo">
            <div>
                <h1>Sistema de Funcionários</h1>
                <p class="subtitulo">POO + MVC + PDO + Sessões</p>
            </div>

            <div class="sessao-box">
                <?php if ($operadorAtual !== null): ?>
                    <span class="boas-vindas">
                        Bem-vindo(a), <strong><?= htmlspecialchars($operadorAtual, ENT_QUOTES, 'UTF-8') ?></strong>!
                    </span>
                    <form method="POST" action="index.php" class="inline-form">
                        <input type="hidden" name="acao" value="encerrar_sessao">
                        <button type="submit" class="btn btn-secundario btn-sm">Encerrar Sessão</button>
                    </form>
                <?php else: ?>
                    <form method="POST" action="index.php" class="inline-form">
                        <input type="hidden" name="acao" value="definir_operador">
                        <input
                            type="text"
                            name="operador"
                            placeholder="Nome do operador"
                            required
                        >
                        <button type="submit" class="btn btn-primario btn-sm">Registrar Operador</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <main class="container">
        <?php if ($feedback !== null): ?>
            <div class="alerta <?= $feedback['tipo'] === 'sucesso' ? 'alerta-sucesso' : 'alerta-erro' ?>">
                <?= htmlspecialchars($feedback['mensagem'], ENT_QUOTES, 'UTF-8') ?>
            </div>
        <?php endif; ?>

        <?php require_once __DIR__ . '/views/cadastro.php'; ?>
        <?php require_once __DIR__ . '/views/lista.php'; ?>
    </main>
</body>
</html>
