<?php

namespace SudoBee\Lyra\Entities;

class Location
{
	private string $id;

	private string $title;

	private string $country;

	private string $latitude;

	private string $longitude;

	public function getId(): string
	{
		return $this->id;
	}

	public function getTitle(): string
	{
		return $this->title;
	}

	public function getCountry(): string
	{
		return $this->country;
	}

	public function getLatitude(): string
	{
		return $this->latitude;
	}

	public function getLongitude(): string
	{
		return $this->longitude;
	}

	public static function fromData(array $data): Location
	{
		$location = new Location();

		$location->id = $data['id'];

		$location->title = $data['title'];

		$location->country = $data['country']['code'];

		$location->latitude = $data['latitude'];

		$location->longitude = $data['longitude'];

		return $location;
	}
}
