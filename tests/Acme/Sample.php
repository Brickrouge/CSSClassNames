<?php

namespace Test\Brickrouge\Acme;

class Sample
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

    protected function get_css_class_names(): array
    {
        return $this->css_class_names;
    }
}
