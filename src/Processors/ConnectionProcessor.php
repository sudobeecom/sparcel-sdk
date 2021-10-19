<?php

namespace SudoBee\Lyra\Processors;

class ConnectionProcessor extends Processor
{
	public function getUrl(string $integration, string $name, $secretKey): string
	{
		$encodedData = base64_encode(
			json_encode([
				'integration' => $integration,
				'name' => $name,
				'url' => $this->getHostUrl(),
				'secret' => $secretKey,
			])
		);

		return $this->configuration->getServerEndpoint() .
			'/v1/connect?data=' .
			$encodedData;
	}

	public function generateSecretKey(): string
	{
		return password_hash(random_bytes(32), PASSWORD_DEFAULT);
	}

	public function disconnect(): bool
	{
		[$status, $response] = $this->postRequest('disconnect');

		return $status === 200;
	}

	private function getHostUrl(): string
	{
		$protocol = $this->isUsingSecureConnection() ? 'https://' : 'http://';

		return $protocol . $_SERVER['HTTP_HOST'];
	}

	private function isUsingSecureConnection(): bool
	{
		if (!isset($_SERVER['HTTPS'])) {
			return false;
		}

		if ($_SERVER['HTTPS'] === 'on') {
			return true;
		}

		if ($_SERVER['SERVER_PORT'] === 443) {
			return true;
		}

		return false;
	}
}
