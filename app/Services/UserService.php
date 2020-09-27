<?php

namespace App\Services;

use App\Models\User;
use Exception;

class UserService
{
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function updateProfile($inputs)
    {
        try {
            $user = auth()->user();
            $user->update($inputs);
            return $user;
        } catch (Exception $e) {
            report($e);

            return false;
        }
    }

    public function findUser($id)
    {
        try {
            return $this->model->find($id);
        } catch (Exception $e) {
            report($e);

            return false;
        }
    }

    public function delete($id)
    {
        try {
            return $this->model::destroy($id);
        } catch (Exception $e) {
            report($e);

            return false;
        }
    }
}