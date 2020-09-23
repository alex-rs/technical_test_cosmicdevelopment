<?php


namespace App\Adapters\Cosmic\API;


use App\Adapters\Cosmic\Auth\AuthInterface;

class APIFactory
{
    /**
     * @param AuthInterface $auth
     * @return Employee
     */
    public static function create(AuthInterface $auth) : Employee
    {
        return new Employee($auth);
    }
}
