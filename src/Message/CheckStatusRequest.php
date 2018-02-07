<?php
namespace Omnipay\Besteron\Message;

use Omnipay\Common\Message\AbstractRequest;

/**
 * Besteron CheckStatus Request
 */
class CheckStatusRequest extends AbstractRequest
{
    /**
     * Setter
     *
     * @param string
     * @return $this
     */
    public function setCid($value)
    {
        return $this->setParameter('cid', $value);
    }

    /**
     * Getter
     *
     * @return string
     */
    public function getCid()
    {
        return $this->getParameter('cid');
    }

    /**
     * Setter
     *
     * @param string
     * @return $this
     */
    public function setApiKey($value)
    {
        return $this->setParameter('apiKey', $value);
    }

    /**
     * Getter
     *
     * @return string
     */
    public function getApiKey()
    {
        return $this->getParameter('apiKey');
    }

    /**
     * Get the raw data array for the message
     *
     * @return mixed
     */
    public function getData()
    {
        return [
            'Cid' => $this->getCid(),
            'ApiKey' => $this->getApiKey(),
            'Vs' => $this->getTransactionId()
        ];
    }

    /**
     * Send the request with specified data
     *
     * @param mixed
     * @return \Omnipay\Common\Message\ResponseInterface
     */
    public function sendData($data)
    {
        $responseData = $this->httpClient->get('https://ws.besteron.com/rest/is-payment-received', [], ['query' => $data])->send()->json();
        $responseData['vs'] = $data['Vs'];

        return $this->response = new CheckStatusResponse($this, $responseData);
    }
}
