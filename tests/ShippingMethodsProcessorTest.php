<?php

it("should return all shipping methods", function () {
	$shippingMethods = lyra()->shippingMethods->get();

	expect($shippingMethods)->toBeArray();
});
