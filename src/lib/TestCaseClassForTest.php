<?php

namespace PHPCraftdream\TestCase
{
	class TestCaseClassForTest
	{
		protected $propertyProtected = 1;

		public function setProtected($val)
		{
			$this->propertyProtected = $val;
		}

		public function getProtected()
		{
			return $this->propertyProtected;
		}

		//----------------------------------------------

		protected $propertyPrvate = 2;

		public function setPrivate($val)
		{
			$this->propertyPrvate = $val;
		}

		public function getPrivate()
		{
			return $this->propertyPrvate;
		}
		
		protected function protectedMethod()
		{
			$arr = func_get_args();
			
			return [$arr, $arr];
		}
	}
}