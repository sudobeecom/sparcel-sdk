<?php

namespace SudoBee\Sparcel;

use SudoBee\Sparcel\Processors\ConnectionProcessor;
use SudoBee\Sparcel\Processors\LocationsProcessor;
use SudoBee\Sparcel\Processors\ShipmentsProcessor;
use SudoBee\Sparcel\Processors\ShippingMethodsProcessor;
use SudoBee\Sparcel\Processors\ViewsProcessor;

class Sparcel
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
