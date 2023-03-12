<?php

namespace Marlemiesz\Ifirma\HttpClient;

use GuzzleHttp\Client;
use Marlemiesz\Ifirma\Enum\KeyNameEnum;
use Marlemiesz\Ifirma\Request\RequestInterface;

class GuzzleClient extends HttpClient
{
    const HTTP_SUCCESS = [200, 201, 202, 203, 204, 205, 206, 207, 208, 226];
    private Client $httpInvoiceConnection;
    
    public function __construct(
        readonly string $userName,
        readonly string $invoiceKey,
        readonly string|null $subscriptionKey = null,
        readonly string|null $expenseKey = null,
        readonly string|null $accountKey = null,
    )
    {
    }
    
    public function call(RequestInterface $request)
    {
    
        $client = $this->getClient($request);
        $response = $client->request($request->getMethod()->getValue(), $request->getUri(), [
            'json' => $request->getPayload()?->toPrimitive()
        ]);
        
        var_dump($response->getBody()->getContents());die();
        $this->validResponse($response);
        return $request->prepareResponse(json_decode($response->getBody()->getContents(), true));
    }
    
    /**
     * @param \Psr\Http\Message\ResponseInterface $response
     * @return void
     * @throws \Exception
     */
    protected function validResponse(\Psr\Http\Message\ResponseInterface $response): void
    {
        if (in_array($response->getStatusCode(), self::HTTP_SUCCESS) === false) {
            throw new \Exception($response->getBody()->getContents(), $response->getStatusCode());
        }
    }
    
    protected function getKey(RequestInterface $request): string
    {
        if($request->getKeyName() === KeyNameEnum::Invoice) {
            return $this->generateKey($this->invoiceKey);
        }
        if($request->getKeyName() === KeyNameEnum::Subscription) {
            return $this->generateKey($this->subscriptionKey);
        }
        if($request->getKeyName() === KeyNameEnum::Expense) {
            return $this->generateKey($this->expenseKey);
        }
        if($request->getKeyName() === KeyNameEnum::Account) {
            return $this->generateKey($this->accountKey);
        }
        return '';
    }
    
    protected function generateKey(string $keyValue): string
    {
        return
            chr(hexdec(substr($keyValue, 0, 2)))
            . chr(hexdec(substr($keyValue, 2, 2)))
            . chr(hexdec(substr($keyValue, 4, 2)))
            . chr(hexdec(substr($keyValue, 6, 2)))
            . chr(hexdec(substr($keyValue, 8, 2)))
            . chr(hexdec(substr($keyValue, 10, 2)))
            . chr(hexdec(substr($keyValue, 12, 2)))
            . chr(hexdec(substr($keyValue, 14, 2)));
    }
    
    protected function prepareHashHmacSha1(string $url, string $keyName, string $keyValue, ?array $payload = null): string
    {
        if($payload) {
            $payload = json_encode($payload);
        }
        return hash_hmac('sha1', $url . $this->userName . $keyName . $payload, $keyValue);
    }
    
    /**
     * @param RequestInterface $request
     * @return Client
     */
    protected function getClient(RequestInterface $request): Client
    {
        $hashedKey = $this->getKey($request);
        $hashHmac = $this->prepareHashHmacSha1(
            self::API_URL . $request->getUri(),
            $request->getKeyName()->getValue(),
            $hashedKey,
            $request->getPayload()?->toPrimitive()
        );
        $client = new Client([
            'base_uri' => self::API_URL,
            'headers' => [
                'Accept' => 'application/json',
                'Content-type' => 'application/json; charset=UTF-8',
                'Authentication' => 'IAPIS user=' . $this->userName . ', hmac-sha1=' . $hashHmac
            ]
        ]);
        return $client;
    }
}
