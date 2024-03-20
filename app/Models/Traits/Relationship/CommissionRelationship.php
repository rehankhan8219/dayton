<?php

namespace App\Models\Traits\Relationship;

use App\Models\User;
use App\Models\Broker;

/**
 * Class CommissionRelationship.
 */
trait CommissionRelationship
{
    /**
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }
}