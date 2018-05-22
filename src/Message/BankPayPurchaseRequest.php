<?php
namespace Omnipay\Besteron\Message;

/**
 * Besteron BankPay Purchase Request
 */
class BankPayPurchaseRequest extends PurchaseRequest
{
    /**
     * Get the raw data array for the message
     *
     * @return mixed
     */
    public function getData()
    {
        $data = parent::getData();

        $data['bic'] = $data['type'];
        unset($data['type']);
        $data['ss'] = '';

        return $data;
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
        return 'https://payments.besteron.com/bank-pay-request';
    }

    /**
     * Get hash for response
     *
     * @param string timestamp
     * @return string
     */
    public function getHash()
    {
        return $this->createHash($this->getCid() . $this->getAmount() . $this->getCurrencyNumeric() . $this->getTransactionId() . '');
    }
}
