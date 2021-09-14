<?php

namespace SudoBee\Lyra;

class Configuration
{
	const PUBLIC_SERVER_ENDPOINT = 'http://lyra.test';

	const API_VERSION = 'v1';

	private string $serverEndpoint;

	private ?string $secretKey;

	public static function make(?string $secretKey): Configuration
	{
		$configuration = new Configuration();

		$configuration->setServerEndpoint(self::PUBLIC_SERVER_ENDPOINT);

		$configuration->setSecretKey($secretKey);

		return $configuration;
	}

	public function getServerEndpoint(): string
	{
		return $this->serverEndpoint;
	}

	public function setServerEndpoint(string $serverEndpoint): self
	{
		$this->serverEndpoint = $serverEndpoint;

		return $this;
	}

	public function getSecretKey(): ?string
	{
		return $this->secretKey;
	}

	public function setSecretKey(?string $secretKet): self
	{
		$this->secretKey = $secretKet;

		return $this;
	}
}
