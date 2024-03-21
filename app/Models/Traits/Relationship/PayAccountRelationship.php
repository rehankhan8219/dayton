<?php

namespace App\Models\Traits\Relationship;

use App\Models\User;

/**
 * Class Grow TreeRelationship.
 */
trait PayAccountRelationship
{
    /**
     * @return mixed
     */
    public function fromUser()
    {
        return $this->belongsTo(User::class, 'from_user_id')->withTrashed();
    }
    
    /**
     * @return mixed
     */
    public function toUser()
    {
        return $this->belongsTo(User::class, 'to_user_id')->withTrashed();
    }
}