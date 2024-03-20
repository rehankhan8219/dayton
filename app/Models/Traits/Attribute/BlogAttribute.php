<?php

namespace App\Models\Traits\Attribute;

/**
 * Trait BlogAttribute.
 */
trait BlogAttribute
{
    /**
     * @return string
     */
    public function getImageUrlAttribute()
    {
        return $this->getImageUrl();
    }
}
