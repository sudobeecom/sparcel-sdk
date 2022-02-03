<?php

it("should return all shipping methods", function () {
	$shippingMethods = sparcel()->shippingMethods->get();

	expect($shippingMethods)->toBeArray();
});
