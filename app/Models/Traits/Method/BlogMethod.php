<?php

namespace App\Models\Traits\Method;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

/**
 * Trait BlogMethod.
 */
trait BlogMethod
{
    /**
     * @return mixed|string
     */
    public function getImageUrl()
    {
        if($this->image && Storage::exists($this->image)) {
            return asset('storage/'.$this->image);
        }
        
        return null;
    }
}
