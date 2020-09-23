<?php


namespace App\Adapters\Cosmic\API;


use App\Adapters\Cosmic\Auth\AuthInterface;

interface BaseInterface
{
    /**
     * @param AuthInterface $auth
     * @return $this
     */
    function authenticate(AuthInterface $auth) : self ;
}
