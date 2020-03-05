<?php

namespace Phpackage\Siigo\Model;

trait ArrayableModel
{
    public function toArray(): array
    {
        $model = [];

        foreach ($this as $propertyName => $propertyValue) {
            if (is_null($propertyValue)) {
                continue;
            }

            $model[ucfirst($propertyName)] = $propertyValue instanceof Model
                ? $propertyValue->toArray()
                : $propertyValue;
        }

        return $model;
    }
}