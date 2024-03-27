<?php

namespace App\Models\Traits\Relationship;

use App\Models\User;

/**
 * Class WithdrawalRelationship.
 */
trait WithdrawalRelationship
{
    /**
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }
}