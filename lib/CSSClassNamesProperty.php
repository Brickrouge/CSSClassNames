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
 * @property-read string[] $css_class_names The CSS class names of the instance.
 */
trait CSSClassNamesProperty
{
	/**
	 * Return the rendered CSS class of the instance.
	 *
	 * @param string[]|string|null $modifiers CSS class names modifiers
	 *
	 * @return string
	 */
	public function css_class(array|string|null $modifiers = null): string
    {
		return render_css_class($this->css_class_names, $modifiers);
	}

	/**
	 * Returns the CSS class of the instance.
	 */
	protected function get_css_class(): string
    {
		return $this->css_class();
	}

	/**
	 * Returns the CSS class names of the instance.
	 *
	 * @return array[string]mixed
	 */
	abstract protected function get_css_class_names(): array;

	/**
	 * The method is declared as abstract because the {@link get_css_class()} and
	 * {@link get_css_class_names()} method are meant to be mapped to magic properties.
	 *
	 * @param string $property
	 */
	abstract public function __get($property);
}
