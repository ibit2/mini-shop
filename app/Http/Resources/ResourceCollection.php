<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection as RCollection;
use Illuminate\Support\Str;

class ResourceCollection extends RCollection
{
    protected function collects()
    {
        if ($this->collects) {
            return $this->collects;
        }
        if (Str::endsWith(class_basename($this), 'Collection') &&
            class_exists($class = Str::replaceLast('Collection', 'Resource', get_class($this)))) {
            return $class;
        }
    }

}
