   <?php if ($funcionarioParaExcluir !== null): ?>
        <div class="confirmacao-box">
            <p>
                Tem certeza que deseja excluir o funcionário
                <strong><?= htmlspecialchars($funcionarioParaExcluir->getNome(), ENT_QUOTES, 'UTF-8') ?></strong>
                </p>
            <form method="POST" action="index.php" class="inline-form">
                <input type="hidden" name="acao" value="confirmar_exclusao">
                <input type="hidden" name="id" value="<?= (int) $funcionarioParaExcluir->getId() ?>">
                <button type="submit" class="btn btn-perigo">Confirmar Exclusão</button>
                <a href="index.php" class="btn btn-secundario">Cancelar</a>
            </form>
        </div>
    <?php endif; ?>

    <?php if (empty($funcionarios)): ?>
        <p class="vazio">Nenhum funcionário cadastrado até o momento.</p>
    <?php else: ?>
        <div class="tabela-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Tipo</th>
                        <th>Salário</th>
                        <th>Bônus</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($funcionarios as $func): ?>
                        <?php
                            $bonus = $func->calcularBonus();
                            $rotuloTipo = $func->getTipo() === 'gerente' ? 'Gerente (15%)' : 'Funcionário Comum (5%)';
                        ?>
                        <tr>
                            <td>
                                <strong><?= htmlspecialchars($func->getNome(), ENT_QUOTES, 'UTF-8') ?></strong><br>
                                <small><?= htmlspecialchars($func->getEmail(), ENT_QUOTES, 'UTF-8') ?></small>
                            </td>
                            <td><?= htmlspecialchars($rotuloTipo, ENT_QUOTES, 'UTF-8') ?></td>
                            <td>R$ <?= number_format($func->getSalario(), 2, ',', '.') ?></td>
                            <td>R$ <?= number_format($bonus, 2, ',', '.') ?></td>
                            <td>
                                <a
                                    href="index.php?excluir=<?= (int) $func->getId() ?>"
                                    class="btn btn-perigo btn-sm"
                                >
                                    Excluir
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </body>
            </table>
        </div>
        ?>