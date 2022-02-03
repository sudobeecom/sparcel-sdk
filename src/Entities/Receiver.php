<?php

namespace SudoBee\Sparcel\Entities;

class Receiver
{
	private string $fullName;

	private string $email;

	private ?string $companyName = null;

	private ?string $phoneNumber = null;

	private ?string $firstAddress = null;

	private ?string $secondAddress = null;

	private ?string $houseNumber = null;

	private ?string $postalCode = null;

	private ?string $city = null;

	private ?string $country = null;

	private ?string $locationId = null;

	public static function make(): Receiver
	{
		return new Receiver();
	}

	public function getFullName(): string
	{
		return $this->fullName;
	}

	public function setFullName(string $fullName): self
	{
		$this->fullName = $fullName;

		return $this;
	}

	public function getEmail(): string
	{
		return $this->email;
	}

	public function setEmail(string $email): self
	{
		$this->email = $email;

		return $this;
	}

	public function getCompanyName(): ?string
	{
		return $this->companyName;
	}

	public function setCompanyName(?string $companyName): self
	{
		$this->companyName = $companyName;

		return $this;
	}

	public function getPhoneNumber(): ?string
	{
		return $this->phoneNumber;
	}

	public function setPhoneNumber(?string $phoneNumber): self
	{
		$this->phoneNumber = $phoneNumber;

		return $this;
	}

	public function getFirstAddress(): ?string
	{
		return $this->firstAddress;
	}

	public function setFirstAddress(?string $firstAddress): self
	{
		$this->firstAddress = $firstAddress;

		return $this;
	}

	public function getSecondAddress(): ?string
	{
		return $this->secondAddress;
	}

	public function setSecondAddress(?string $secondAddress): self
	{
		$this->secondAddress = $secondAddress;

		return $this;
	}

	public function getHouseNumber(): ?string
	{
		return $this->houseNumber;
	}

	public function setHouseNumber(?string $houseNumber): self
	{
		$this->houseNumber = $houseNumber;

		return $this;
	}

	public function getPostalCode(): ?string
	{
		return $this->postalCode;
	}

	public function setPostalCode(?string $postalCode): self
	{
		$this->postalCode = $postalCode;

		return $this;
	}

	public function getCity(): ?string
	{
		return $this->city;
	}

	public function setCity(?string $city): self
	{
		$this->city = $city;

		return $this;
	}

	public function getCountry(): ?string
	{
		return $this->country;
	}

	public function setCountry(?string $country): self
	{
		$this->country = $country;

		return $this;
	}

	public function getLocationId(): ?string
	{
		return $this->locationId;
	}

	public function setLocationId(?string $locationId): self
	{
		$this->locationId = $locationId;

		return $this;
	}

	public function isLocationBased(): bool
	{
		return $this->locationId !== null;
	}
}
