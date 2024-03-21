<?php

namespace App\Events\Member;

use App\Models\User as Member;
use Illuminate\Queue\SerializesModels;

/**
 * Class MemberDeleted.
 */
class MemberDeleted
{
    use SerializesModels;

    /**
     * @var
     */
    public $member;

    /**
     * @param $member
     */
    public function __construct(Member $member)
    {
        $this->member = $member;
    }
}
