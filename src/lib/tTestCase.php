<?php

namespace PHPCraftdream\TestCase
{

	use ReflectionMethod;

	trait tTestCase
	{
		//----------------------------------------------------------------------
		protected $phpcdReflections = array();
		protected $phpcdProperties = array();
		protected $phpcdMethods = array();

		//----------------------------------------------------------------------
		protected function phpcdReflectionExists(string $className)
		{
			$exists = array_key_exists($className, $this->phpcdReflections);
			return $exists;
		}

		protected function phpcdPropertyExists(string $key)
		{
			$exists = array_key_exists($key, $this->phpcdProperties);
			return $exists;
		}

		protected function phpcdMakeReflection(string $className)
		{
			$reflection = new \ReflectionClass($className);
			return $reflection;
		}

		//----------------------------------------------------------------------
		protected function phpcdGetReflection(string $className)
		{
			if ($this->phpcdReflectionExists($className))
				return $this->phpcdReflections[$className];

			$reflection = $this->phpcdMakeReflection($className);
			$this->phpcdReflections[$className] = $reflection;

			return $reflection;
		}

		protected function phpcdGetProperty(string $className, string $prop)
		{
			$key = $className . '->' . $prop;
			if ($this->phpcdPropertyExists($key))
				return $this->phpcdProperties[$key];

			$reflection = $this->phpcdGetReflection($className);

			$property = $reflection->getProperty($prop);
			$property->setAccessible(true);

			$this->phpcdProperties[$key] = $property;

			return $property;
		}

		//----------------------------------------------------------------------
		public function setProp($obj, string $prop, $val)
		{
			$property = $this->phpcdGetProperty(get_class($obj), $prop);
			$property->setValue($obj, $val);

			return $val;
		}

		public function getProp($obj, string $prop)
		{
			$property = $this->phpcdGetProperty(get_class($obj), $prop);
			$val = $property->getValue($obj);

			return $val;
		}

		//----------------------------------------------------------------------
		public function getMethod($objOrClassName, string $methodName): ReflectionMethod
		{
			$className = is_object($objOrClassName) ? get_class($objOrClassName) : $objOrClassName;
			$key = $className . '->' . $methodName;

			if (!empty($this->phpcdMethods[$key]))
				return $this->phpcdMethods[$key];

			$reflection = $this->phpcdGetReflection($className);
			$method = $reflection->getMethod($methodName);
			$method->setAccessible(true);

			$this->phpcdMethods[$key] = $method;

			return $method;
		}
	}
}
