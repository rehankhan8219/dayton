<?php

namespace App\Models\Traits\Relationship;

use App\Models\HelpCenter;

/**
 * Class HelpCategoryRelationship.
 */
trait HelpCategoryRelationship
{
    /**
     * @return mixed
     */
    public function helpCenters()
    {
        return $this->hasMany(HelpCenter::class);
    }
}