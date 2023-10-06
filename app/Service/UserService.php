<?php
namespace App\Service;

use App\Models\User;
use Illuminate\Support\Str;

class UserService {
    /**
     * During social login, this function will retrieve user basic information and 
     * will store into database
     *
     * @param User $user
     * @param String $socialIdColumn
     * @return User
     */
    public function createSocialUser($user, $socialIdColumn): User
    {
        $data = [
            'name' => $user->name,
            'username' => Str::slug($user->name),
            'email' => $user->email,
            'password' => bcrypt('12345678'),
            $socialIdColumn => $user->id,
        ];
        
        return User::create($data);
    }

}