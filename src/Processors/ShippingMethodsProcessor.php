<?php

namespace SudoBee\Lyra\Processors;

use SudoBee\Lyra\Entities\ShippingMethod;

class ShippingMethodsProcessor extends Processor
{
	/**
	 * @return ShippingMethod[]
	 */
	public function get(): array
	{
		$shippingMethods = $this->getRequest('shippingMethods');

		return $this->transformArrayToEntities(ShippingMethod::class, $shippingMethods);
	}
}
