<?php

require_once 'autoload.php';

class Some
{
	protected $value = 'hello';

	public function getValue()
	{
		return $this->value;
	}
}

class testSome
{
	use \PHPCraftdream\TestCase\tTestCase;
}

$some = new Some();
$testSome = new testSome();

var_dump($some->getValue() === 'hello'); //true

$testSome->setProp($some, 'value', 'bye');
var_dump($some->getValue() === 'bye'); //true

$testSome->setProp($some, 'value', 'byebye');
var_dump($testSome->getProp($some, 'value') === 'byebye'); //true