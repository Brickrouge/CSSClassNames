<?php

/*
 * This file is part of the Brickrouge package.
 *
 * (c) Olivier Laviale <olivier.laviale@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Brickrouge;

use Brickrouge\CSSClassNamesTest\A;

class CSSClassNamesTest extends \PHPUnit_Framework_TestCase
{
	static private $data = [

		'node-id' => 'node-id-13',
		'node-slug' => 'node-slug-example',
		'is-active' => true,
		'is-disabled' => false
	];

	/**
	 * @dataProvider provide_modifiers
	 */
	public function test_render_css_class($expected, $modifiers)
	{
		$this->assertEquals($expected, render_css_class(self::$data, $modifiers));
	}

	/**
	 * @dataProvider provide_modifiers
	 */
	public function test_property($expected, $modifiers)
	{
		$a = new A(self::$data);
		$this->assertEquals($expected, $a->css_class($modifiers));
	}

	public function provide_modifiers()
	{
		return [

			[ "node-id-13 node-slug-example is-active", null ],
			[ "node-id-13 is-active", [ 'node-id', 'is-active', 'is-disabled' ] ],
			[ "node-id-13 is-active", 'node-id is-active is-disabled' ],
			[ "is-active", [ '-node-id', '-node-slug' ] ],
			[ "is-active", '-node-id -node-slug' ]
		];
	}
}

namespace Brickrouge\CSSClassNamesTest;

class A
{
	use \Brickrouge\CSSClassNamesProperty;

	private $css_class_names;

	public function __construct(array $css_class_names)
	{
		$this->css_class_names = $css_class_names;
	}

	public function __get($property)
	{
		switch ($property)
		{
			case 'css_class': return $this->get_css_class();
			case 'css_class_names': return $this->get_css_class_names();
		}

		throw new \BadMethodCallException("Undefined property: $property.");
	}

	protected function get_css_class_names()
	{
		return $this->css_class_names;
	}
}