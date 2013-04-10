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

class CSSClassNamesTest extends \PHPUnit_Framework_TestCase
{
	static private $data = array
	(
		'node-id' => 'node-id-13',
		'node-slug' => 'node-slug-example',
		'is-active' => true,
		'is-disabled' => false
	);

	public function testModifiers()
	{
		$this->assertEquals("node-id-13 node-slug-example is-active", render_css_class(self::$data));
		$this->assertEquals("node-id-13 is-active", render_css_class(self::$data, array('node-id', 'is-active', 'is-disabled')));
		$this->assertEquals("node-id-13 is-active", render_css_class(self::$data, 'node-id is-active is-disabled'));
		$this->assertEquals("is-active", render_css_class(self::$data, array('-node-id', '-node-slug')));
		$this->assertEquals("is-active", render_css_class(self::$data, '-node-id -node-slug'));
	}
}