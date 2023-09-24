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

use ICanBoogie\Event;

class AlterCSSClassNamesEvent extends Event
{
	/**
	 * The event is constructed with the type `alter_css_class_names`.
	 *
	 * @param array<string, mixed> $names Reference to the CSS class names.
	 */
	public function __construct(
        object $sender,
        public array &$names
    ) {
		parent::__construct($sender);
	}
}
