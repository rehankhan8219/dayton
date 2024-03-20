<?php

namespace App\Models\Traits\Relationship;

use App\Models\Broker;

/**
 * Class UserRelationship.
 */
trait UserRelationship
{
    /**
     * @return mixed
     */
    public function passwordHistories()
    {
        return $this->morphMany(PasswordHistory::class, 'model');
    }
    
    /**
     * @return mixed
     */
    public function brokers()
    {
        return $this->hasMany(Broker::class);
    }
}