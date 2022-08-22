<?php

namespace App\Reositories\Repos;
use App\User;
use App\Repository\Interfaces\IUserRepository;
use Illuminate\Support\Facades\Hash;

class UserRepository implements IUserRepository{

    protected $user = null;

    public function getAllUsers()
    {
        return User::all();
    }

    public function getUserById($id)
    {
        return User::find($id);
    }
    public function createOrUpdate( $id = null, $collection = [] )
    {   
        if(is_null($id)) {
            $user = new User;
            $user->uid = $collection['uid'];
            $user->name = $collection['name'];
            $user->email = $collection['email'];
            $user->password = Hash::make('password');
            $user->job = $collection['job'];
            return $user->save();
        }
        $user = User::find($id);
        $user->uid = $collection['uid'];
        $user->name = $collection['name'];
        $user->email = $collection['email'];
        $user->job = $collection['job'];
        return $user->save();
    }


    public function deleteUser($id)
    {
        return User::find($id)->delete();
    }
}



?>