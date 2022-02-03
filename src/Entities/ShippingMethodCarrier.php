<?php

namespace SudoBee\Sparcel\Entities;

class ShippingMethodCarrier
{
	private string $slug;

	private string $name;

	private string $addressType;

	public function getSlug(): string
	{
		return $this->slug;
	}

	public function getName(): string
	{
		return $this->name;
	}

	public function getAddressType(): string
	{
		return $this->addressType;
	}

	public static function fromData(array $data): ShippingMethodCarrier
	{
		$shippingMethodCarrier = new ShippingMethodCarrier();

		$shippingMethodCarrier->slug = $data['slug'];

		$shippingMethodCarrier->name = $data['name'];

		$shippingMethodCarrier->addressType = $data['address_type'];

		return $shippingMethodCarrier;
	}
}
