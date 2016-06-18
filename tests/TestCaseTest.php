<?php
namespace PHPCraftdream\test;

class TestCase
{
	use \PHPCraftdream\TestCase\tTestCase;
}

class TestCaseTest extends \PHPUnit_Framework_TestCase
{
	public function testAll()
	{
		$obj = new \PHPCraftdream\TestCase\TestCaseClassForTest();
		$testCase = new TestCase();

		$rand1 = bin2hex(random_bytes(5));
		$rand2 = bin2hex(random_bytes(5));

		$obj->setProtected($rand1);
		$this->assertEquals($rand1, $obj->getProtected());

		$obj->setPrivate($rand2);
		$this->assertEquals($rand2, $obj->getPrivate());

		//-------------------------------------------------------

		$rand3 = bin2hex(random_bytes(5));
		$rand4 = bin2hex(random_bytes(5));

		$testCase->setProp($obj, 'propertyProtected', $rand3);
		$this->assertEquals($rand3, $obj->getProtected());

		$testCase->setProp($obj, 'propertyPrvate', $rand4);
		$this->assertEquals($rand4, $obj->getPrivate());

		//-------------------------------------------------------

		$rand5 = bin2hex(random_bytes(5));
		$rand6 = bin2hex(random_bytes(5));

		$obj->setProtected($rand5);
		$this->assertEquals($rand5, $testCase->getProp($obj, 'propertyProtected'));

		$obj->setPrivate($rand6);
		$this->assertEquals($rand6, $testCase->getProp($obj, 'propertyPrvate'));

		//-------------------------------------------------------
	}
}