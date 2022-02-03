<?php

use SudoBee\Sparcel\Configuration;
use SudoBee\Sparcel\Enums\Integration;

it("should return connection url", function () {
	/**
	 * getUrl() utilizes HTTP_HOST variable to construct shop's url.
	 * As this variable is not available on testing, we have to
	 * create it ourselves.
	 */
	$_SERVER["HTTP_HOST"] = "localhost";

	$url = sparcel(Configuration::make(null))->connection->getUrl(
		Integration::WOOCOMMERCE,
		"Test shop",
		"TEST"
	);

	expect($url)->toBe(
		"https://sparcel.io/v1/connect?data=eyJpbnRlZ3JhdGlvbiI6Ildvb0NvbW1lcmNlIiwibmFtZSI6IlRlc3Qgc2hvcCIsInVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdCIsInNlY3JldCI6IlRFU1QifQ=="
	);
});

it("should return generated secret key", function () {
	$key = sparcel()->connection->generateSecretKey();

	expect($key)->toBeString();
});

it("should disconnect shop", function () {
	$disconnected = sparcel()->connection->disconnect();

	expect($disconnected)->toBeTrue();

	$disconnected = sparcel()->connection->disconnect();

	expect($disconnected)->toBeFalse();
})->skip(
	"Only run when required. Results in others test to fail as it disconnects shop."
);
