<?php

namespace App\Models\Traits\Relationship;

use App\Models\User;
use App\Models\Level;

/**
 * Class GrowTreeRelationship.
 */
trait GrowTreeRelationship
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
    public function level()
    {
        return $this->belongsTo(Level::class)->withTrashed();
    }
}