<?php


namespace Omnipay\Besteron\Message;


use Omnipay\Common\Message\AbstractResponse;

class WidgetPurchaseRequest extends PurchaseRequest
{
    /**
     * {@inheritdoc}
     */
    public function getData()
    {
        $data = parent::getData();
        unset($data['type']);

        $data['language'] = $this->getLang();
        $data['paymentmethod'] = $this->getPaymentMethod();

        return $data;
    }

    /**
     * Get hash for request
     *
     * @return string
     */
    public function getHash()
    {
        return $this->createHash($this->getCid() . $this->getPaymentMethod() . $this->getAmount() . $this->getCurrencyNumeric() . $this->getTransactionId() . $this->getReturnUrl());
    }

    /**
     * {@inheritdoc}
     */
    public function sendData($data)
    {
        return $this->response = new WidgetPurchaseResponse($this, $data);
    }

    /**
     * Get endpoint
     *
     * @return string
     */
    public function getEndpoint()
    {
        return $this->getTest() ? 'https://client.besteron.com/inline/besteronInlineVirtual.js' : 'https://client.besteron.com/inline/besteronInline.js';
    }
}