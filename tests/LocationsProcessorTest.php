<?php

it('should return all carrier\'s locations', function () {
	$locations = lyra()->locations->get("Omniva");

	expect($locations)->toBeArray();
});

it(
	'should return all carrier\'s locations from specified country',
	function () {
		$locations = lyra()->locations->get("Omniva", "LT");

		foreach ($locations as $location) {
			expect($location->getCountry())->toBe("LT");
		}

		expect($locations)->toBeArray();
	}
);
