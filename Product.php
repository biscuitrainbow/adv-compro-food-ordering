<?php
require_once "./vendor/autoload.php";

use Riesenia\Cart\CartItemInterface;

class Product implements CartItemInterface
{
	public $id;
	public $name;
	public $price;
	public $quantity = 0.0;

	function __construct($id, $name, $price)
	{
		$this->id = $id;
		$this->name = $name;
		$this->price = $price;
	}

	public function getCartId(): string
	{
		return (string) $this->id;
	}

	/**
	 * Get type of the item.
	 *
	 * @return string
	 */
	public function getCartType(): string
	{
		return 'food';
	}

	/**
	 * Get name of the item.
	 *
	 * @return string
	 */
	public function getCartName(): string
	{
		return $this->name;
	}

	/**
	 * Set cart context.
	 *
	 * @param array $context
	 */
	public function setCartContext(array $context)
	{ }

	/**
	 * Set cart quantity.
	 *
	 * @param float $quantity
	 */
	public function setCartQuantity(float $quantity)
	{
		$this->quantity = $quantity;
	}

	/**
	 * Get cart quantity.
	 *
	 * @return float
	 */
	public function getCartQuantity(): float
	{
		return $this->quantity;
	}

	/**
	 * Get unit price based on quantity and context.
	 *
	 * @return float
	 */
	public function getUnitPrice(): float
	{
		return $this->price;
	}

	/**
	 * Get tax rate percentage.
	 *
	 * @return float
	 */
	public function getTaxRate(): float
	{
		return 0.0;
	}
}
