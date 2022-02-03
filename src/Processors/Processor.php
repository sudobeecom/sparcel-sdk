<?php

namespace SudoBee\Sparcel\Processors;

use SudoBee\Sparcel\Configuration;

abstract class Processor
{
	protected Configuration $configuration;

	public function __construct(Configuration $configuration)
	{
		$this->configuration = $configuration;
	}

	protected function getRequest(string $url)
	{
		return $this->makeRequest("GET", $url);
	}

	protected function postRequest(string $url, array $data = [])
	{
		return $this->makeRequest("POST", $url, $data);
	}

	/**
	 * @template T
	 * @param T $entityClass
	 * @param array $data
	 * @return T[]
	 */
	protected function transformArrayToEntities(
		string $entityClass,
		array $data
	): array {
		return array_map(fn($entity) => $entityClass::fromData($entity), $data);
	}

	private function makeRequest(string $type, string $url, array $data = [])
	{
		$session = curl_init();

		$headers = [
			"Accept: application/json",
			"Content-Type: application/json",
			"X-Api-Secret: " . $this->configuration->getSecretKey(),
		];

		curl_setopt($session, CURLOPT_URL, $this->getServerEndpoint() . $url);
		curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($session, CURLOPT_HTTPHEADER, $headers);

		if ($type === "POST") {
			curl_setopt($session, CURLOPT_POST, 1);
			curl_setopt($session, CURLOPT_POSTFIELDS, json_encode($data));
		}

		$output = curl_exec($session);

		$status = curl_getinfo($session, CURLINFO_HTTP_CODE);

		curl_close($session);

		return [$status, json_decode($output, true)];
	}

	private function getServerEndpoint(): string
	{
		return $this->configuration->getServerEndpoint() .
			"/api/" .
			$this->configuration::API_VERSION .
			"/";
	}
}
