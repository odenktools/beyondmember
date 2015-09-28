<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 9/28/2015
 * Time: 9:44 AM
 */

namespace Ngakost\BeyondMember\Guards;

use Illuminate\Auth\Guard;
use Illuminate\Contracts\Auth\Guard as GuardContract;

class BeyondMemberGuard extends Guard implements GuardContract
{
    /**
     * Attempt to authenticate a user using the given credentials.
     *
     * @param  array $credentials
     * @param  bool $remember
     * @param  bool $login
     * @return bool
     */
    public function attempt(array $credentials = [], $remember = false, $login = true)
    {
        $this->fireAttemptEvent($credentials, $remember, $login);

        $this->lastAttempted = $user = $this->provider->retrieveByCredentials($credentials);

        // If an implementation of UserInterface was returned, we'll ask the provider
        // to validate the user against the given credentials, and if they are in
        // fact valid we'll log the users into the application and return true.
        if ($this->hasValidCredentials($user, $credentials)) {

            if ($login) {
                $this->login($user, $remember);
            }

            return true;
        }

        return false;
    }

}