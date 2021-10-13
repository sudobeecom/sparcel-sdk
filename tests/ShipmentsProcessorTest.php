<?php

use SudoBee\Lyra\Entities\Item;
use SudoBee\Lyra\Entities\Order;
use SudoBee\Lyra\Entities\Receiver;
use SudoBee\Lyra\Enums\ShipmentStatus;

function createShipment(): ?string
{
	$shippingMethods = lyra()->shippingMethods->get();

	$shippingMethod = $shippingMethods[0];

	$locations = lyra()->locations->get($shippingMethod->getCarrier()->getSlug(), 'LT');

	$receiver = Receiver::make()
		->setFullName('Tom Edison')
		->setEmail('tom@example.com')
		->setPhoneNumber('+31686153286')
		->setLocationId($locations[0]->getId());

	$order = Order::make()
		->setReferenceId('#3214')
		->setTotalPrice(2000)
		->setCurrency('EUR')
		->setItems([
			Item::make()
				->setName('Test item')
				->setPrice(1000)
				->setQuantity(1),
		]);

	return lyra()->shipments->create(
		$shippingMethod->getId(),
		$order,
		$receiver,
		ShipmentStatus::ORDER_CREATED
	);
}

it('should create new shipment', function () {
	$shipmentId = createShipment();

	expect($shipmentId)->toBeString();
});

it('should update existing shipment', function () {
	$shipmentId = createShipment();

	$statusUpdate = lyra()->shipments->update(
		$shipmentId,
		ShipmentStatus::ORDER_CANCELLED
	);

	expect($statusUpdate)->toBeTrue();
});
