<?php

namespace SudoBee\Sparcel\Entities;

class ShippingMethodPricing
{
	private string $type;

	private int $value;

	public function getType(): string
	{
		return $this->type;
	}

	public function getValue(): int
	{
		return $this->value;
	}

	public static function fromData(array $data): ShippingMethodPricing
	{
		$shippingMethodPricing = new ShippingMethodPricing();

		$shippingMethodPricing->type = $data['type'];

		$shippingMethodPricing->value = $data['value'];

		return $shippingMethodPricing;
	}
}
