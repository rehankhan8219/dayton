<?php

namespace App\Models\Traits\Relationship;

use App\Models\Broker;
use App\Models\Withdrawal;

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
    
    /**
     * @return mixed
     */
    public function withdrawals()
    {
        return $this->hasMany(Withdrawal::class);
    }
}