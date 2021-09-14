<?php

namespace SudoBee\Lyra\Processors;

use SudoBee\Lyra\Entities\Item;
use SudoBee\Lyra\Entities\Order;
use SudoBee\Lyra\Entities\Receiver;
use SudoBee\Lyra\Enums\ShipmentStatus;

class ShipmentsProcessor extends Processor
{
	public function create(
		string $shippingMethod,
		Order $order,
		Receiver $receiver,
		string $status = ShipmentStatus::READY_TO_PROCESS
	): ?string {

		$response = $this->postRequest('shipments', [
			'status' => $status,
			'order' => [
				'shop_reference_id' => $order->getReferenceId(),
				'total_price' => $order->getTotalPrice(),
				'currency' => $order->getCurrency(),
				'items' => $this->mapItems($order->getItems()),
			],
			'receiver' => [
				'full_name' => $receiver->getFullName(),
				'company_name' => $receiver->getCompanyName(),
				'email' => $receiver->getEmail(),
				'phone_number' => $receiver->getPhoneNumber(),
				'first_address' => $receiver->getFirstAddress(),
				'second_address' => $receiver->getSecondAddress(),
				'house_number' => $receiver->getHouseNumber(),
				'postal_code' => $receiver->getPostalCode(),
				'city' => $receiver->getCity(),
				'country' => $receiver->getCountry(),
				'location_id' => $receiver->getLocationId(),
			],
			'shipping_method_id' => $shippingMethod,
		]);

		return is_array($response) && array_key_exists('id', $response)
			? $response['id']
			: null;
	}

	/**
	 * @param Item[] $items
	 * @return array
	 */
	private function mapItems(array $items): array
	{
		return array_map(
			fn(Item $item) => [
				'name' => $item->getName(),
				'image' => $item->getImage(),
				'price' => $item->getPrice(),
				'width' => $item->getWidth(),
				'height' => $item->getHeight(),
				'length' => $item->getLength(),
				'weight' => $item->getWeight(),
				'quantity' => $item->getQuantity(),
			],
			$items
		);
	}
}
