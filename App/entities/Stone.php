<?php namespace Diamancia\App\entities;

class Stone
{
private int $id_stone;
private string $name_stone;

public function __construct(int $id_stone, string $name_stone)
{
$this->id_stone = $id_stone;
$this->name_stone = $name_stone;
}

public function getId(): int
{
return $this->id_stone;
}

public function getName(): string
{
return $this->name_stone;
}
}
