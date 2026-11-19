    <section class = "card">
    <h1> Cadastrar Funcionário</h1>
    <from method "POST" action = "index.php" class = "form-grid">
        <input type="hidden" name="acao" value="cadastrar">

        <div class="campo">
            <label for="nome">Nome *</label>
            <input type="text" id="nome" name="nome" required placeholder="Ex.: Ana Silva">
        </div>

        <div class="campo">
            <label for="email">E-mail *</label>
            <input type="email" id="email" name="email" required placeholder="Ex.: ana@empresa.com">
        </div>

        <div class="campo">
            <label for="salario">Salário (R$) *</label>
            <input type="number" id="salario" name="salario" step="0.01" min="0.01" required placeholder="Ex.: 3500.00">
        </div>

        <div class="campo">
            <label for="tipo">Tipo de Funcionário *</label>
            <select id="tipo" name="tipo" required>
                <option value="">Selecione...</option>
                <option value="comum">Funcionário Comum (5% bônus)</option>
                <option value="gerente">Gerente (15% bônus)</option>
</select>
</div>

<div class = "acoes-form">
    <button type="submit class="bnt bnt-primario">Salvar Funcionário</button>
</div>
</form>
</section>





