<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\Relationship\HelpCenterRelationship;

class HelpCenter extends Model
{
    use SoftDeletes,
        HelpCenterRelationship;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'help_category_id',
        'title',
        'explanation',
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
