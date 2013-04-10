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

/**
 * Interface for classes implementing CSS class names.
 *
 * Classes implementing the interface should provide the {@link css_class} and
 * {@link css_class_names} magic properties.
 *
 * @property-read string $css_class The CSS class of the instance.
 * @property-read array[string]mixed $css_class_names The CSS class names of the instance.
 */
interface CSSClassNames
{
	/**
	 * Renders the CSS class names into a string.
	 *
	 * @param array|string $modifiers Modifiers used to select or remove the class names.
	 */
	public function css_class($modifiers=null);
}