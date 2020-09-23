<?php


namespace App\Adapters\Cosmic\Auth;


interface AuthInterface
{
    /**
     * @param array $payload
     * @return $this
     */
    function init(array $payload) : self ;

    /**
     * @return $this
     */
    function resolve() : self ;

    /**
     * @return Token
     */
    function connect() : Token ;

}
