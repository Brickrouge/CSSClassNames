# CSSClassNames [![Build Status](https://travis-ci.org/Brickrouge/CSSClassNames.png?branch=master)](https://travis-ci.org/Brickrouge/CSSClassNames)

An API to support CSS class names.





## Helper

```php
<?php

namespace Brickrouge;

$class_names = array
(
	'node-id' => 'node-id-13',
	'node-slug' => 'node-slug-example',
	'is-active' => true,
	'is-disabled' => false
);

render_css_class($class_names)                                                // "node-id-13 node-slug-example is-active"
render_css_class($class_names, array('node-id', 'is-active', 'is-disabled')); // "node-id-13 is-active"
render_css_class($class_names, 'node-id is-active is-disabled');              // "node-id-13 is-active"
render_css_class($class_names, array('-node-id', '-node-slug')));             // "is-active"
render_css_class($class_names, '-node-id -node-slug');                        // "is-active"
```





## CSSClassNames and CSSClassNamesProperty

Classes that implements the `CSSClassNames` interface might want to use the `CSSClassNamesProperty`
trait that provide support for the `css_class` and `css_class_names` magic properties.

```php
<?php

namespace Icybee\Modules\Nodes;

use Brickrouge\CSSClassNames;
use Brickrouge\CSSClassNamesProperty;

// …

class Node extends ActiveRecord implements CSSClassNames
{
	use CSSClassNamesProperty;

	// …

	/**
	 * Returns the CSS class names of the node.
	 *
	 * @return array[string]mixed
	 */
	protected function get_css_class_names()
	{
		$nid = $this->nid;
		$slug = $this->slug;

		return array
		(
			'type' => 'node',
			'id' => $nid ? "node-{$nid}" : null,
			'slug' => $slug ? "node-slug-{$slug}" : null,
			'constructor' => 'constructor-' . \ICanBoogie\normalize($this->constructor)
		);
	}
}
```

An instance of such a `Node` class could be used as follows:

```php
<?php

// …

$node->css_class;
// node node-123 node-slug-example constructor-nodes
$node->css_class_names;
// [ 'type' => node, 'id' => 'node-123', 'slug' => 'node-slug-example', 'constructor' => 'constructor-nodes' ]
$node->css_class('-slug -constructor');
// node node-123
$node->css_class('id slug');
// node-123 node-slug-example
```




-----




## Requirement

The package requires PHP 5.3 or later.





## Installation

The recommended way to install this package is through [Composer](http://getcomposer.org/).
Create a `composer.json` file and run `php composer.phar install` command to install it:

```json
{
	"minimum-stability": "dev",
	"require":
	{
		"brickrouge/css-class-names": "*"
	}
}
```





### Cloning the repository

The package is [available on GitHub](https://github.com/Brickrouge/CSSClassNames), its repository can be
cloned with the following command line:

	$ git clone git://github.com/Brickrouge/CSSClassNames.git





## Documentation

The documentation for the package and its dependencies can be generated with the `make doc`
command. The documentation is generated in the `docs` directory using [ApiGen](http://apigen.org/).
The package directory can later by cleaned with the `make clean` command.





## Testing

The test suite is ran with the `make test` command. [Composer](http://getcomposer.org/) is
automatically installed as well as all the dependencies required to run the suite. The package
directory can later be cleaned with the `make clean` command.

The package is continuously tested by [Travis CI](http://about.travis-ci.org/).

[![Build Status](https://travis-ci.org/Brickrouge/CSSClassNames.png?branch=master)](https://travis-ci.org/Brickrouge/CSSClassNames)





## License

Brickrouge/CSSClassNames is licensed under the New BSD License - See the [LICENSE](https://raw.github.com/Brickrouge/CSSClassNames/master/LICENSE) file for details.