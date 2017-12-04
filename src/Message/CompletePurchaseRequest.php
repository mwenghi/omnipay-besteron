<?php
namespace Omnipay\Besteron\Message;

use Omnipay\Common\Exception\InvalidResponseException;

/**
 * Besteron CompletePurchase Request
 */
class CompletePurchaseRequest extends PurchaseRequest
{
    /**
     * Get the raw data array for the message
     *
     * @return mixed
     */
    public function getData()
    {
        if ($this->getHash() != $this->getBankHash()) {
            throw new InvalidResponseException('Odpoveď z platobnej brány sa nepodarilo overiť. Prosím kontaktujte nás.');
        }

        return $this->httpRequest->query->all();
    }

    /**
     * Send the request with specified data
     *
     * @param mixed
     * @return \Omnipay\Common\Message\ResponseInterface
     */
    public function sendData($data)
    {
        return $this->response = new CompletePurchaseResponse($this, $data);
    }

    /**
     * Get hash for response
     *
     * @param string timestamp
     * @return string
     */
    protected function getHash()
    {
        return $this->createHash($this->getCid() . $this->httpRequest->query->get('TYPE') . $this->httpRequest->query->get('AMNT') . $this->httpRequest->query->get('CURR') . $this->httpRequest->query->get('VS') . $this->httpRequest->query->get('RESULT'));
    }

    /**
     * Get hash from bank response
     *
     * @return string
     */
    protected function getBankHash()
    {
        return $this->httpRequest->query->get('SIGN');
    }
}
