<?php

namespace SudoBee\Lyra\Store;

use SudoBee\Lyra\Entities\ShippingMethod;

class StoreData
{
	private ?string $shopId = null;

	private ?string $secretKey = null;

	/** @var ShippingMethod[] $shippingMethods */
	private array $shippingMethods = [];

	public static function make(): StoreData
	{
		return new StoreData();
	}

	public static function fromData(array $data): StoreData
	{
		$storeData = new StoreData();

		$storeData->shopId = $data['shopId'];

		$storeData->secretKey = $data['secretKey'];

		$storeData->shippingMethods = array_map(
			fn(array $shippingMethod) => ShippingMethod::fromData($shippingMethod),
			$data['shippingMethods']
		);

		return $storeData;
	}

	public function getShopId(): ?string
	{
		return $this->shopId;
	}

	public function setShopId(?string $shopId): self
	{
		$this->shopId = $shopId;

		return $this;
	}

	public function getSecretKey(): ?string
	{
		return $this->secretKey;
	}

	public function setSecretKey(?string $secretKey): self
	{
		$this->secretKey = $secretKey;

		return $this;
	}

	/**
	 * @return ShippingMethod[]
	 */
	public function getShippingMethods(): array
	{
		return $this->shippingMethods;
	}

	/**
	 * @param ShippingMethod[] $shippingMethods
	 */
	public function setShippingMethods(array $shippingMethods): self
	{
		$this->shippingMethods = $shippingMethods;

		return $this;
	}

	public function toArray(): array
	{
		return [
			'shopId' => $this->getShopId(),
			'secretKey' => $this->getSecretKey(),
			'shippingMethods' => array_map(
				fn(ShippingMethod $shippingMethod) => $shippingMethod->toArray(),
				$this->getShippingMethods()
			),
		];
	}
}
