<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\Relationship\HelpCategoryRelationship;

class HelpCategory extends Model
{
    use SoftDeletes,
        HelpCategoryRelationship;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [];
    
    /**
     * The attributes that should be appended to collection.
     *
     * @var array<string, string>
     */
    protected $appends = [];
}
