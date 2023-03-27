<?php namespace Diamancia\App\entities;

class Size
{
private int $id_size;
private string $number_size;

public function __construct(int $id_size, string $number_size)
{
$this->id_size = $id_size;
$this->number_size = $number_size;
}

public function getId(): int
{
return $this->id_size;
}

public function getName(): string
{
return $this->number_size;
}
}
