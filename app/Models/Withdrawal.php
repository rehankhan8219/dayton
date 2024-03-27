<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\Attribute\WithdrawalAttribute;
use App\Models\Traits\Relationship\WithdrawalRelationship;

class Withdrawal extends Model
{
    use SoftDeletes,
        WithdrawalAttribute,
        WithdrawalRelationship;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'bank_name',
        'bank_account_number',
        'bank_account_name',
        'amount',
        'status',
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
