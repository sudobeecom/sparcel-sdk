<?php

namespace SudoBee\Lyra;

use SudoBee\Lyra\Configuration;
use SudoBee\Lyra\Processors\ConnectionProcessor;
use SudoBee\Lyra\Processors\LocationsProcessor;
use SudoBee\Lyra\Processors\ShipmentsProcessor;
use SudoBee\Lyra\Processors\ShippingMethodsProcessor;
use SudoBee\Lyra\Processors\ViewsProcessor;

class Lyra
{
	public ConnectionProcessor $connection;

	public LocationsProcessor $locations;

	public ShipmentsProcessor $shipments;

	public ShippingMethodsProcessor $shippingMethods;

	public ViewsProcessor $views;

	public function __construct(Configuration $configuration)
	{
		$this->connection = new ConnectionProcessor($configuration);

		$this->locations = new LocationsProcessor($configuration);

		$this->shipments = new ShipmentsProcessor($configuration);

		$this->shippingMethods = new ShippingMethodsProcessor($configuration);

		$this->views = new ViewsProcessor($configuration);
	}
}
