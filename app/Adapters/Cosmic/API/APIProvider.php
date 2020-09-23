<?php


namespace App\Adapters\Cosmic\API;


use App\Adapters\Cosmic\Auth\AuthInterface;
use App\Adapters\Cosmic\Auth\Token;
use Illuminate\Support\Facades\Http;

abstract class APIProvider implements BaseInterface
{
    /**
     * @var Token
     */
    protected Token $token;

    /**
     * @param AuthInterface $auth
     * @return $this|BaseInterface
     */
    public function authenticate(AuthInterface $auth): BaseInterface
    {
        $this->token = $auth->init([
            'grant_type' => env('cosmic_grant_type'),
            'client_id' => env('cosmic_client_id'),
            'client_secret' => env('cosmic_client_secret'),
            'username' => env('cosmic_username'),
            'password' => env('cosmic_password')
        ])->resolve()->connect();

        return $this;
    }

    /**
     * @param string $uri
     * @return array|null
     */
    protected function get(string $uri) : ?array
    {
        $request = Http::withHeaders($this->bindHeaders())->get($uri)->json()['data'];
        $response = [];
        foreach ($request as $data){
            $data['reference_id'] = $data['id'];
            unset($data['id']);
            $response[] = $data;
        }

        return $response;
    }

    /**
     * @return array
     */
    private function bindHeaders() : array
    {
        return ['Access-Token' => $this->token->access_token];
    }
}
