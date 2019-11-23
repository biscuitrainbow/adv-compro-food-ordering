<?php
require_once './Product.php';
require_once 'vendor/autoload.php';

use MathPHP\Number;
use MathPHP\Functions;

class Order extends product
{
	protected $amount;
	protected $total;
	function __construct($number,$name,$price,$amount)
	{
		parent::__construct($number,$name,$price);
		$this->amount=$amount;
		$this->total=0;
	}
	
	function amount()
	{
		return $this->amount;
	}
	function showtotal()
	{
		return $this->total;
	}
	function total($price,$amount)
	{
		$bigInt = new Number($price,$amount);
		$product1 = $bigInt->multiply();
		$this->total = $this->total+$product1;
	}
	function putintocart()
	{
		return 1;
	}
}