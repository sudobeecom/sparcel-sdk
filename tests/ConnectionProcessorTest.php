<?php

use SudoBee\Lyra\Configuration;
use SudoBee\Lyra\Enums\Integration;

it('should return connection url when secret key is null', function () {
	/**
	 * getUrl() utilizes HTTP_HOST variable to construct shop's url.
	 * As this variable is not available on testing, we have to
	 * create it ourselves.
	 */
	$_SERVER['HTTP_HOST'] = 'localhost';

	$url = lyra(Configuration::make(null))->connection->getUrl(
		Integration::WOOCOMMERCE,
		'Test shop'
	);

	expect($url)
		->toBeString()
		->toStartWith('http://lyra.test/connect?data=');
});

it('should return no connection url when secret key is provided', function () {
	$_SERVER['HTTP_HOST'] = 'localhost';

	$url = lyra()->connection->getUrl(Integration::WOOCOMMERCE, 'Test shop');

	expect($url)->toBeNull();
});

it('should return generated secret key', function () {
	$key = lyra()->connection->generateSecretKey();

	expect($key)->toBeString();
});
