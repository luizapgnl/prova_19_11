<?php

abstract class Funcionario
{
    protected ?int $id;
    protected string $nome;
    protected string $email;
    protected float $salario;
    protected string $tipo;

    public function __construct(
        string $nome,
        string $email,
        float $salario,
        string $tipo,
        ?int $id = null
    ) {
        $this->id = $id;
        $this->setNome($nome);
        $this->setEmail($email);
        $this->setSalario($salario);
        $this->setTipo($tipo);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = trim($nome);
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = trim($email);
    }

    public function getSalario(): float
    {
        return $this->salario;
    }

    public function setSalario(float $salario): void
    {
        $this->salario = max(0, $salario);
    }

    public function getTipo(): string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): void
    {
        $this->tipo = $tipo;
    }

    // Abstração: cada subtipo define sua própria regra de bônus (polimorfismo)
    abstract public function calcularBonus(): float;
}