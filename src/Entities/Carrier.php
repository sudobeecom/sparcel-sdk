<?php

namespace SudoBee\Lyra\Entities;

class Carrier
{
	private string $id;

	private string $name;

	public function getId(): string
	{
		return $this->id;
	}

	public function getName(): string
	{
		return $this->name;
	}

	public static function fromData(array $data): Carrier
	{
		$carrier = new Carrier();

		$carrier->id = $data['id'];

		$carrier->name = $data['name'];

		return $carrier;
	}
}
