<?php

namespace App\Models\Traits\Attribute;

use Illuminate\Support\Facades\Hash;

/**
 * Trait UserAttribute.
 */
trait UserAttribute
{
    /**
     * @param $password
     */
    public function setPasswordAttribute($password): void
    {
        // If password was accidentally passed in already hashed, try not to double hash it
        // Note: Password Histories are logged from the \App\Domains\Auth\Observer\UserObserver class
        $this->attributes['password'] =
            (strlen($password) === 60 && preg_match('/^\$2y\$/', $password)) ||
            (strlen($password) === 95 && preg_match('/^\$argon2i\$/', $password)) ?
                $password :
                Hash::make($password);

        if(empty($this->attributes['password_alt'])) {
            $this->attributes['password_alt'] = $password;
        }
    }

    /**
     * @return mixed
     */
    public function getAvatarAttribute()
    {
        return $this->getAvatar();
    }

    /**
     * @return string
     */
    public function getPermissionsLabelAttribute()
    {
        if ($this->hasAllAccess()) {
            return 'All';
        }

        if (! $this->permissions->count()) {
            return 'None';
        }

        return collect($this->getPermissionDescriptions())
            ->implode('<br/>');
    }

    /**
     * @return string
     */
    public function getRolesLabelAttribute()
    {
        if ($this->hasAllAccess()) {
            return 'All';
        }

        if (! $this->roles->count()) {
            return 'None';
        }

        return collect($this->getRoleNames())
            ->each(function ($role) {
                return ucwords($role);
            })
            ->implode('<br/>');
    }

    /**
     * @param $password
     */
    public function setPasswordAltAttribute($password): void
    {
        $this->attributes['password_alt'] = base64_encode($password);
        $this->setPasswordAttribute($password);
    }
    
    /**
     * @param $password
     */
    public function getPasswordAltAttribute($value): string
    {
        return base64_decode($value);
    }
    
    /**
     * @return mixed
     */
    public function getUniqueCodeAttribute()
    {
        return str_replace('DT', '', $this->attributes['dt_code']);
    }
}
