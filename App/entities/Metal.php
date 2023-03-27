<?php namespace Diamancia\App\entities;

class Metal
{
private int $id_metal;
private string $name_metal;

public function __construct(int $id_metal, string $name_metal)
{
$this->id_metal = $id_metal;
$this->name_metal = $name_metal;
}

public function getId(): int
{
return $this->id_metal;
}

public function getName(): string
{
return $this->name_metal;
}
}

?>