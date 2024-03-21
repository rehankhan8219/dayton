<?php

namespace App\Events\Broker;

use App\Models\Broker;
use Illuminate\Queue\SerializesModels;

/**
 * Class BrokerCreated.
 */
class BrokerCreated
{
    use SerializesModels;

    /**
     * @var
     */
    public $broker;

    /**
     * @param $broker
     */
    public function __construct(Broker $broker)
    {
        $this->broker = $broker;
    }
}
