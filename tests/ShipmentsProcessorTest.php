<?php

use SudoBee\Lyra\Entities\Item;
use SudoBee\Lyra\Entities\Order;
use SudoBee\Lyra\Entities\Receiver;

it('should create new shipment', function () {
	$shippingMethods = lyra()->shippingMethods->get();

	$shippingMethod = $shippingMethods[0];

	$locations = lyra()->locations->get($shippingMethod->getCarrier()->getSlug(), 'LT');

	$receiver = Receiver::make()
		->setFullName('Tom Edison')
		->setEmail('tom@example.com')
		->setPhoneNumber('+31686153286')
		->setLocation($locations[0]);

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

	$shipment = lyra()->shipments->create($shippingMethod->getId(), $order, $receiver);

	expect($shipment)->toBeString();
});
