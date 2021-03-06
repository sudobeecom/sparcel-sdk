<?php

use SudoBee\Sparcel\Entities\Item;
use SudoBee\Sparcel\Entities\Order;
use SudoBee\Sparcel\Entities\Receiver;
use SudoBee\Sparcel\Enums\ShipmentStatus;

function createShipment(): ?string
{
	$shippingMethods = sparcel()->shippingMethods->get();

	$shippingMethod = $shippingMethods[0];

	$locations = sparcel()->locations->get(
		$shippingMethod->getCarrier()->getSlug(),
		"LT"
	);

	$receiver = Receiver::make()
		->setFullName("Tom Edison")
		->setEmail("tom@example.com")
		->setPhoneNumber("+31686153286")
		->setLocationId($locations[0]->getId())
		->setCountry("LT");

	$order = Order::make()
		->setReferenceId("#3214")
		->setTotalPrice(2000)
		->setCurrency("EUR")
		->setItems([
			Item::make()
				->setName("Test item")
				->setPrice(1000)
				->setQuantity(1),
		]);

	return sparcel()->shipments->create(
		$shippingMethod->getId(),
		$order,
		$receiver,
		ShipmentStatus::ORDER_CREATED
	);
}

it("should create new shipment", function () {
	$shipmentId = createShipment();

	expect($shipmentId)->toBeString();
});

it("should update existing shipment", function () {
	$shipmentId = createShipment();

	$statusUpdate = sparcel()->shipments->update(
		$shipmentId,
		ShipmentStatus::ORDER_CANCELLED
	);

	expect($statusUpdate)->toBeTrue();
});
