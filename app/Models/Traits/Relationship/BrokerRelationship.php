<?php

namespace App\Models\Traits\Relationship;

use App\Models\RiskCalculator;
use App\Models\User;

/**
 * Class BrokerRelationship.
 */
trait BrokerRelationship
{
    /**
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }
    
    /**
     * @return mixed
     */
    public function riskCalculator()
    {
        return $this->belongsTo(RiskCalculator::class)->withTrashed();
    }
}