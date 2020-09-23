<?php


namespace App\Adapters\Cosmic\Auth;


use Illuminate\Support\Facades\Http;

class AuthProvider implements AuthInterface
{

    protected Token $token;
    private array $request_payload;
    private string $realm;

    /**
     * @param array $payload
     * @return AuthInterface
     */
    public function init(array $payload): AuthInterface
    {
        $this->request_payload = $payload;
        $this->realm = env('COSMIC_ENDPOINT') . 'token/';

        return $this;
    }

    /**
     * @return $this|AuthInterface
     * @throws \Exception
     */
    public function resolve(): AuthInterface
    {
        $response = Http::post($this->realm,$this->request_payload);
        if($response->status() !== 200)
            throw new \Exception();

        $token_data = $response->json();
        $this->token = new Token(
            $token_data['data']['access_token'],
            $token_data['data']['token_type'],
            $token_data['data']['expires_at']
        );
        return $this;
    }

    /**
     * @return Token
     */
    public function connect(): Token
    {
        if(isset($this->token))
            return $this->token;
    }
}
