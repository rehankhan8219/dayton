<?php

namespace App\Models\Traits\Attribute;

/**
 * Trait CommissionAttribute.
 */
trait CommissionAttribute
{
    /**
     * @return string
     */
    public function getPeriodAttribute()
    {
        return carbon($this->attributes['start_date'])->format('d/m/Y'). ' - '.carbon($this->attributes['end_date'])->format('d/m/Y');
    }
}
