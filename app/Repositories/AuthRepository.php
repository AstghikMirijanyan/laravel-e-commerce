<?php

namespace App\Repositories;

use App\Models\Registration;
use App\Models\User;
use App\Repositories\Interfaces\AuthRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthRepository implements AuthRepositoryInterface
{

    /**
     * AuthRepository constructor.
     * @param Registration $model
     */


    /**
     * @param array $data
     * @return bool
     */
    public function createUser(array $data): bool
    {
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        if ($user->save()) {
            return true;
        }
        return false;
    }

    /**
     * @param array $data
     * @return bool
     */
    public function userLogin(array $data): bool
    {
        if (Auth::attempt($data)) {
            return true;
        }
        return false;
    }

}
