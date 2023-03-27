<?php namespace Diamancia\App\entities;

class Type
{
private int $id_type;
private string $type_name;

public function __construct(int $id_type, string $type_name)
{
$this->id_type = $id_type;
$this->type_name = $type_name;
}

public function getId(): int
{
return $this->id_type;
}

public function getName(): string
{
return $this->type_name;
}
}
