<?php

namespace App\Services;

use App\Models\User;
use Exception;
use PDOException;

class UserService
{
    protected $varProtected = 10;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function getVarProtected(){
        // dd($this->varProtected);
    }

    public function createUser($inputs)
    {
        try {
            return $this->model->create($inputs);
        } catch (Exception $e) {
            //TODO
            throw $e;
            return false;
        }
    }

    public function updateUser($id, $data)
    {
        try {
            $user = $this->model->find($id);
            $user->update($data);
            return $user;
        } catch (Exception $e) {
            report($e);

            return false;
        }
    }

    public function doExample()
    {
        $data = $this->getDataGuzzle();

        // TODO
        $sum = array_sum($data['point']);
        $user->update(['point' => $sum]);
        // ..

        return true;
    }

    public function getDataGuzzle()
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://api.github.com/repos/guzzle/guzzle');

        return $response->getBody()->getContents();
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

    public function calcSum($a, $b)
    {
        $sum = $a + $b;
        if ($a + $b == 0) {
            return 'Tổng hai số = 0';
        }

        return $sum;
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