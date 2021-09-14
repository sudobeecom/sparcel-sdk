<?php

namespace SudoBee\Lyra\Entities;

class Item
{
	private string $name;

	private ?string $image = null;

	private ?int $price = null;

	private ?int $width = null;

	private ?int $height = null;

	private ?int $length = null;

	private ?int $weight = null;

	private ?int $quantity = null;

	public static function make(): self
	{
		return new Item();
	}

	public function getName(): string
	{
		return $this->name;
	}

	public function setName(string $name): self
	{
		$this->name = $name;

		return $this;
	}

	public function getImage(): ?string
	{
		return $this->image;
	}

	public function setImage(?string $image): self
	{
		$this->image = $image;

		return $this;
	}

	public function getPrice(): ?int
	{
		return $this->price;
	}

	public function setPrice(?int $price): self
	{
		$this->price = $price;

		return $this;
	}

	public function getWidth(): ?int
	{
		return $this->width;
	}

	public function setWidth(?int $width): self
	{
		$this->width = $width;

		return $this;
	}

	public function getHeight(): ?int
	{
		return $this->height;
	}

	public function setHeight(?int $height): self
	{
		$this->height = $height;

		return $this;
	}

	public function getLength(): ?int
	{
		return $this->length;
	}

	public function setLength(?int $length): self
	{
		$this->length = $length;

		return $this;
	}

	public function getWeight(): ?int
	{
		return $this->weight;
	}

	public function setWeight(?int $weight): self
	{
		$this->weight = $weight;

		return $this;
	}

	public function getQuantity(): ?int
	{
		return $this->quantity;
	}

	public function setQuantity(?int $quantity): self
	{
		$this->quantity = $quantity;

		return $this;
	}
}
