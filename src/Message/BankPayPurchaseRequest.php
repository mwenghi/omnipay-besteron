<?php
namespace Omnipay\Besteron\Message;

/**
 * Besteron BankPay Purchase Request
 */
class BankPayPurchaseRequest extends PurchaseRequest
{
    /**
     * Setter
     *
     * @param string
     * @return $this
     */
    public function setSs($value)
    {
        return $this->setParameter('ss', $value);
    }

    /**
     * Getter
     *
     * @return string
     */
    public function getSs()
    {
        return $this->getParameter('ss');
    }

    /**
     * Getter
     *
     * @return string
     */
    public function getType()
    {
        return 'TRANSFERPAY';
    }
    
    /**
     * Get the raw data array for the message
     *
     * @return mixed
     */
    public function getData()
    {
        return array_merge([
            'ss' => $this->getSs()
        ], parent::getData());
    }

    /**
     * Send the request with specified data
     *
     * @param mixed
     * @return \Omnipay\Common\Message\ResponseInterface
     */
    public function sendData($data)
    {
        return $this->response = new BankPayPurchaseResponse($this, $data);
    }

    /**
     * Get endpoint
     *
     * @return string
     */
    public function getEndpoint()
    {
        return 'https://payments.besteron.com/pay-request';
    }

    /**
     * Get hash for response
     *
     * @param string timestamp
     * @return string
     */
    public function getHash()
    {
        return $this->createHash($this->getCid(). $this->getType() . $this->getAmount() . $this->getCurrencyNumeric() . $this->getTransactionId() . $this->getSs() . $this->getReturnUrl());
    }
}
