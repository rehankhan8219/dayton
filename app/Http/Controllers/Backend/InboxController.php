<?php

namespace App\Http\Controllers\Backend;

use App\Models\Inbox;
use App\Services\InboxService;

/**
 * Class InboxController.
 */
class InboxController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.inbox.index');
    }
}
