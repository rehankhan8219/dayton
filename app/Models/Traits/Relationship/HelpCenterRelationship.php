<?php

namespace App\Models\Traits\Relationship;

use App\Models\HelpCategory;

/**
 * Class HelpCenterRelationship.
 */
trait HelpCenterRelationship
{
    /**
     * @return mixed
     */
    public function helpCategory()
    {
        return $this->belongsTo(HelpCategory::class)->withTrashed();
    }
}