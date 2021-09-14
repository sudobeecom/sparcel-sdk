<?php

namespace SudoBee\Lyra\Entities;

class Order
{
	private string $referenceId;

	private ?int $totalPrice = null;

	private ?string $currency = null;

	/** @var Item[] $items */
	private array $items;

	public static function make(): self
	{
		return new Order();
	}

	public function getReferenceId(): string
	{
		return $this->referenceId;
	}

	public function setReferenceId(string $referenceId): self
	{
		$this->referenceId = $referenceId;

		return $this;
	}

	public function getTotalPrice(): ?int
	{
		return $this->totalPrice;
	}

	public function setTotalPrice(?int $totalPrice): self
	{
		$this->totalPrice = $totalPrice;

		return $this;
	}

	public function getCurrency(): ?string
	{
		return $this->currency;
	}

	public function setCurrency(?string $currency): self
	{
		$this->currency = $currency;

		return $this;
	}

	/**
	 * @return Item[]
	 */
	public function getItems(): array
	{
		return $this->items;
	}

	/**
	 * @param Item[] $items
	 * @return $this
	 */
	public function setItems(array $items): self
	{
		$this->items = $items;

		return $this;
	}
}
