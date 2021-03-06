<?php

namespace SudoBee\Sparcel\Processors;

use SudoBee\Sparcel\Entities\Location;

class LocationsProcessor extends Processor
{
	/**
	 * @param string $carrier
	 * @param string|null $country
	 * @return Location[]
	 */
	public function get(string $carrier, string $country = null): array
	{
		[$status, $locations] = $this->getRequest(
			'locations/' . $carrier . ($country !== null ? '?country=' . $country : '')
		);

		return $this->transformArrayToEntities(Location::class, $locations);
	}
}
