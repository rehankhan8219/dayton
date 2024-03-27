<?php

namespace App\Models\Traits\Attribute;

/**
 * Trait WithdrawalAttribute.
 */
trait WithdrawalAttribute
{
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
