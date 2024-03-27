<?php

namespace App\Models\Traits\Attribute;

/**
 * Trait BillAttribute.
 */
trait BillAttribute
{
    /**
     * @return string
     */
    public function getPeriodAttribute()
    {
        return carbon($this->attributes['start_date'])->format('d/m/Y'). ' - '.carbon($this->attributes['end_date'])->format('d/m/Y');
    }
    
    /**
     * @return string
     */
    public function getStatusColorAttribute()
    {
        switch ($this->attributes['status']) {
            case 'unpaid':
                $color = 'danger';  
                break;

            case 'paid':
                $color = 'success';  
                break;
            
            default:
                $color = 'warning';
                break;
        }

        return $color;
    }
}
