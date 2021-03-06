<?php

use SudoBee\Sparcel\Configuration;
use SudoBee\Sparcel\Sparcel;

function sparcel(?Configuration $providedConfiguration = null): Sparcel
{
	$configuration =
		$providedConfiguration === null
			? Configuration::make("DEV_abc")->setServerEndpoint(
				"http://lyra.local"
			)
			: $providedConfiguration;

	return new Sparcel($configuration);
}
