<?php

namespace services\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function get($id)
    {
        return $this->user->find($id);
    }

    public function getAll()
    {
        return $this->user->all();
    }

    public function create($data)
    {
        return $this->user->create($data);
    }

    /**
     * updateUser
     *
     * @param  mixed $user
     * @param  mixed $data
     * @return void
     */
    public function updateUser(User $user, array $data)
    {
        return $user->update($this->editUser($user, $data));
    }

    /**
     * editUser
     *
     * @param  mixed $user
     * @param  mixed $data
     */
    protected function editUser(User $user, $data)
    {
        return array_merge($user->toArray(), $data);
    }

    public function saveUser($data)
    {
        $data['password'] = Hash::make($data['password']);

        return $this->create($data);
    }

    public function deleteUser($id)
    {
        $user = $this->get($id);
        return $user->delete();
    }

    public function validateEmail($email, $edit, $filters = [])
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $found = $this->user->where("email", $email);
            if ($edit) {
                $found->where('id', '!=', $edit);
            }
            if ($found->first()) {
                return ['status' => 0, "msg" => "This Email is already Used."];
            } else {
                return ['status' => 1, "msg" => "Valid Email"];
            }
        } else {
            return ['status' => 0, "msg" => "Invalid Email"];
        }
    }

    public function updateUserPassword($data)
    {
        $this->user->where('id', $data['id'])->update([
            'password' => $data['password'],
        ]);
    }

    public function getUserbyEmail($email)
    {

        return $this->user->where('email', $email)->first();
    }

    /**
     * check password
     * @return bool
     */
    public function checkPassword($data)
    {
        if (!Hash::check($data['password'], Auth::user()->password)) {
            return 'false';
        } else {
            return 'true';
        }
    }
}
