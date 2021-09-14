<?php

namespace SudoBee\Lyra\Store;

use SudoBee\Lyra\Entities\ShippingMethod;
use SudoBee\Lyra\Lyra;

abstract class Store
{
	private ?Lyra $lyra = null;

	private StoreData $storeData;

	public function __construct()
	{
		$this->storeData = new StoreData();
	}

	abstract function get(): StoreData;

	abstract function update(StoreData $storeData): void;

	public function getShopId(): ?string
	{
		$this->storeData = $this->get();

		return $this->storeData->getShopId();
	}

	public function setShopId(?string $shopId): self
	{
		$this->update($this->storeData->setShopId($shopId));

		return $this;
	}

	public function getSecretKey(): ?string
	{
		$this->storeData = $this->get();

		return $this->storeData->getSecretKey();
	}

	public function setSecretKey(?string $secretKey): self
	{
		$this->update($this->storeData->setSecretKey($secretKey));

		return $this;
	}

	/**
	 * @return ShippingMethod[]
	 */
	public function getShippingMethods(): array
	{
		$this->storeData = $this->get();

		return $this->storeData->getShippingMethods();
	}

	public function updateShippingMethods(): self
	{
		if ($this->lyra !== null) {
			$shippingMethods = $this->lyra->shippingMethods->get();

			$this->update($this->storeData->setShippingMethods($shippingMethods));
		}

		return $this;
	}

	public function setLyra(?Lyra $lyra): self
	{
		$this->lyra = $lyra;

		return $this;
	}
}
