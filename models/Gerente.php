<?php

require_once __DIR__ . '/models/Funcionario.php';
class Gerente extends Funcionario
{
    public function __construct(string $nome, string $email, float $salario, ?int $id = null)
    {
        parent::__construct($nome, $email, $salario, 'gerente', $id);
    }

    public function calcularBonus(): float
    {
        return $this->getSalario() * 0.15;
    }
}
