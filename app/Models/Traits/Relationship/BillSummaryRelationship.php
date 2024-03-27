<?php

namespace App\Models\Traits\Relationship;

use App\Models\User;

/**
 * Class BillSummaryRelationship.
 */
trait BillSummaryRelationship
{
    /**
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }
}