<?php


namespace App\Adapters\Cosmic\API;


use App\Adapters\Cosmic\Auth\AuthInterface;

class Employee extends APIProvider
{
    /**
     * Employee constructor.
     * @param AuthInterface $auth
     */
    public function __construct(AuthInterface $auth)
    {
        $this->authenticate($auth);
    }

    /**
     * @return array
     */
    public function list() : array
    {
        return $this->get(env('COSMIC_ENDPOINT') . 'employee/list/');
    }
}
