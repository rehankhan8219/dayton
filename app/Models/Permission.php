<?php

namespace App\Models;

use App\Models\Traits\Scope\PermissionScope;
use App\Models\Traits\Relationship\PermissionRelationship;
use Spatie\Permission\Models\Permission as SpatiePermission;

/**
 * Class Permission.
 */
class Permission extends SpatiePermission
{
    use PermissionRelationship,
        PermissionScope;
}
