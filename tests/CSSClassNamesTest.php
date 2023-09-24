<?php

/*
 * This file is part of the Brickrouge package.
 *
 * (c) Olivier Laviale <olivier.laviale@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Test\Brickrouge;

use PHPUnit\Framework\TestCase;
use Test\Brickrouge\Acme\Sample;

use function Brickrouge\render_css_class;

final class CSSClassNamesTest extends TestCase
{
	private static array $data = [

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
		$a = new Sample(self::$data);
		$this->assertEquals($expected, $a->css_class($modifiers));
	}

    public static function provide_modifiers(): array
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
