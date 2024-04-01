<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\Attribute\CommissionAttribute;
use App\Models\Traits\Relationship\CommissionRelationship;

class Commission extends Model
{
    use SoftDeletes,
        CommissionAttribute,
        CommissionRelationship;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'start_date',
        'end_date',
        'level',
        'amount',
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
    protected $casts = [
        'amount' => 'integer'
    ];
    
    /**
     * The attributes that should be appended to collection.
     *
     * @var array<string, string>
     */
    protected $appends = [
        'period'
    ];
}
