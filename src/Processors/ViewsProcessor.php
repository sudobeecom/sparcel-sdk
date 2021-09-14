<?php

namespace SudoBee\Lyra\Processors;

class ViewsProcessor extends Processor
{
	const SETTINGS_VIEW_VERSION = '0.1.0';

	public function getSettingsViewScript(): string
	{
		return '<script type="module" src="https://unpkg.com/@sudobee/settings-view@' .
			self::SETTINGS_VIEW_VERSION .
			'/dist/lrs/lrs.esm.js"></script>';
	}
}
