<?php


namespace App\Adapters\Cosmic\Auth;


use Carbon\Carbon;

class Token
{
    public string $access_token;
    public string $token_type;
    public Carbon $expires_at;

    /**
     * Token constructor.
     * @param string $access_token
     * @param string $token_type
     * @param string $expires_at
     */
    public function __construct(string $access_token, string $token_type, string $expires_at)
    {
        $this->access_token = $access_token;
        $this->token_type = $token_type;
        $this->expires_at = $this->transformDate($expires_at);
    }

    /**
     * @param string $date
     * @return Carbon
     */
    private function transformDate(string $date) : Carbon
    {
        return Carbon::createFromFormat('Y/m/d H:i:s', $date);
    }

}
