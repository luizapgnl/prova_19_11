<php
    require_once__DIR__.'/models/Funcionario.php';
    class Funcionario_Comum extends Funcionario
    
    public function __construct(string $nome, string $email, float $salario, ?int $id = null)
    {
        parent::__construct($nome, $email, $salario, 'comum', $id);
    }
    public function calcularBonus():floatval{
        return $this->getSalario() * 0.05};
    
    ?>
