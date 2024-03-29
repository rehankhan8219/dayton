<?php

namespace App\Events\Withdrawal;

use App\Models\Withdrawal;
use Illuminate\Queue\SerializesModels;

/**
 * Class WithdrawalCreated.
 */
class WithdrawalCreated
{
    use SerializesModels;

    /**
     * @var
     */
    public $withdrawal;

    /**
     * @param $withdrawal
     */
    public function __construct(Withdrawal $withdrawal)
    {
        $this->withdrawal = $withdrawal;
    }
}
