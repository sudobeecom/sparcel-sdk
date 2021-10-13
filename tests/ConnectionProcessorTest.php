<?php

use SudoBee\Lyra\Configuration;
use SudoBee\Lyra\Enums\Integration;

it('should return connection url', function () {
	/**
	 * getUrl() utilizes HTTP_HOST variable to construct shop's url.
	 * As this variable is not available on testing, we have to
	 * create it ourselves.
	 */
	$_SERVER['HTTP_HOST'] = 'localhost';

	$url = lyra(Configuration::make(null))->connection->getUrl(
		Integration::WOOCOMMERCE,
		'Test shop',
		'TEST'
	);

	expect($url)->toBe(
		'http://lyra.test/v1/connect?data=eyJpbnRlZ3JhdGlvbiI6Ildvb0NvbW1lcmNlIiwibmFtZSI6IlRlc3Qgc2hvcCIsInVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdCIsInNlY3JldCI6IlRFU1QifQ=='
	);
});

it('should return generated secret key', function () {
	$key = lyra()->connection->generateSecretKey();

	expect($key)->toBeString();
});
