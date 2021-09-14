<?php

use SudoBee\Lyra\Configuration;
use SudoBee\Lyra\Lyra;

function lyra(?Configuration $providedConfiguration = null): Lyra
{
	$configuration =
		$providedConfiguration === null
			? Configuration::make('DEV_abc')
			: $providedConfiguration;

	return new Lyra($configuration);
}
