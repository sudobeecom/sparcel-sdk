<?php

namespace SudoBee\Sparcel\Store;

use SudoBee\Sparcel\Entities\ShippingMethod;
use SudoBee\Sparcel\Sparcel;

abstract class Store
{
	private ?Sparcel $lyra = null;

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

			$this->update(
				$this->storeData->setShippingMethods($shippingMethods)
			);
		}

		return $this;
	}

	public function setLyra(?Sparcel $lyra): self
	{
		$this->lyra = $lyra;

		return $this;
	}
}
