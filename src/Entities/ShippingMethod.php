<?php

namespace SudoBee\Sparcel\Entities;

class ShippingMethod
{
	public string $id;

	public string $name;

	/**
	 * @var string[]
	 */
	public array $supportedCountries;

	public ShippingMethodCarrier $carrier;

	public ShippingMethodPricing $pricing;

	public function getId(): string
	{
		return $this->id;
	}

	public function getName(): string
	{
		return $this->name;
	}

	/**
	 * @return string[]
	 */
	public function getSupportedCountries(): array
	{
		return $this->supportedCountries;
	}

	public function getCarrier(): ShippingMethodCarrier
	{
		return $this->carrier;
	}

	public function getPricing(): ShippingMethodPricing
	{
		return $this->pricing;
	}

	public static function fromData(array $data): ShippingMethod
	{
		$shippingMethod = new ShippingMethod();

		$shippingMethod->id = $data['id'];

		$shippingMethod->name = $data['name'];

		$shippingMethod->supportedCountries = $data['supportedCountries'];

		$shippingMethod->carrier = ShippingMethodCarrier::fromData($data['carrier']);

		$shippingMethod->pricing = ShippingMethodPricing::fromData($data['pricing']);

		return $shippingMethod;
	}

	public function toArray(): array
	{
		return [
			'id' => $this->id,
			'name' => $this->name,
			'supportedCountries' => $this->supportedCountries,
			'carrier' => [
				'slug' => $this->getCarrier()->getSlug(),
				'name' => $this->getCarrier()->getName(),
				'address_type' => $this->getCarrier()->getAddressType(),
			],
			'pricing' => [
				'type' => $this->getPricing()->getType(),
				'value' => $this->getPricing()->getValue(),
			],
		];
	}
}
