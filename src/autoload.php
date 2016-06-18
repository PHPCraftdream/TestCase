<?php

call_user_func_array(
	function ()
	{
		$ds = DIRECTORY_SEPARATOR;
		$libDir = $ds . 'lib' . $ds;

		$items = array(
			'PHPCraftdream\\TestCase\\TestCase' => $libDir . 'TestCase.php',
			'PHPCraftdream\\TestCase\\TestCaseClassForTest' => $libDir . 'TestCaseClassForTest.php',
			'PHPCraftdream\\TestCase\\tTestCase' => $libDir . 'tTestCase.php',
		);

		spl_autoload_register(
			function ($className) use ($items)
			{
				if (!array_key_exists($className, $items))
					return;

				require_once __DIR__ . $items[$className];
			},
			true,
			true
		);
	},
	array()
);