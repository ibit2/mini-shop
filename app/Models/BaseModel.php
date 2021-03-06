<?php

namespace App\Models;

use EloquentFilter\Filterable;

trait BaseModel
{
    use Filterable;

    public function getAttribute($key)
    {
        if (property_exists(self::class, 'prohibitedAttributes')) {
            if (in_array($key, $this->prohibitedAttributes)) {
                return parent::getAttribute($key);
            }
        }
        return parent::getAttribute(snake_case($key));

    }

    public function setAttribute($key, $value)
    {
        return parent::setAttribute(snake_case($key), $value);
    }

    public function toArray()
    {
        $array = parent::toArray();
        $arrayCamelCase = [];

        foreach ($array as $key => $value) {
            $arrayCamelCase[camel_case($key)] = $value;
        }

        return $arrayCamelCase;
    }

}
