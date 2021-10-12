<?php
namespace Omnipay\Besteron\Message;

use Omnipay\Common\Message\AbstractRequest;
use phpseclib\Crypt\Rijndael;

/**
 * Besteron Purchase Request
 */
class PurchaseRequest extends AbstractRequest
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
    public function setKey($value)
    {
        return $this->setParameter('key', $value);
    }

    /**
     * Getter
     *
     * @return string
     */
    public function getKey()
    {
        return $this->getParameter('key');
    }

    /**
     * Setter
     *
     * @param string
     * @return $this
     */
    public function setType($value)
    {
        return $this->setParameter('type', $value);
    }

    /**
     * Getter
     *
     * @return string
     */
    public function getType()
    {
        return $this->getParameter('type');
    }

    /**
     * Setter
     *
     * @param string
     * @return $this
     */
    public function setLang($value)
    {
        return $this->setParameter('lang', $value);
    }

    /**
     * Getter
     *
     * @return string
     */
    public function getLang()
    {
        return $this->getParameter('lang');
    }

    /**
     * Setter
     *
     * @param string
     * @return $this
     */
    public function setTest($value)
    {
        return $this->setParameter('test', $value);
    }

    /**
     * Getter
     *
     * @return string
     */
    public function getTest()
    {
        return $this->getParameter('test');
    }

    /**
     * Validates and returns the formated amount
     *
     * @return string
     */
    public function getAmount()
    {
        return number_format(parent::getAmount(), 2, '.', '');
    }

    /**
     * Get hash for request
     *
     * @return string
     */
    public function getHash()
    {
        return $this->createHash($this->getCid() . $this->getType() . $this->getAmount() . $this->getCurrencyNumeric() . $this->getTransactionId() . $this->getReturnUrl());
    }

    /**
     * Get the raw data array for the message
     *
     * @return mixed
     */
    public function getData()
    {
        $this->validate('amount', 'transactionId');

        $data = [];
        $data['cid'] = $this->getCid();
        $data['type'] = $this->getType();
        $data['amnt'] = $this->getAmount();
        $data['curr'] = $this->getCurrencyNumeric();
        $data['vs'] = $this->getTransactionId();
        $data['ru'] = $this->getReturnUrl();
        $data['email'] = $this->getCard()->getEmail();
        $data['sign'] = $this->getHash();

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
        return $this->response = new PurchaseResponse($this, $data);
    }

    /**
     * Get endpoint
     *
     * @return string
     */
    public function getEndpoint()
    {
        return $this->getTest() ? 'https://client.besteron.com/public/virtual-payment/' : 'https://payments.besteron.com/pay-request/';
    }

    /**
     * Create hash
     *
     * @param string
     * @return string
     */
    public function createHash($string)
    {
        $cipher = new Rijndael(Rijndael::MODE_ECB);
        $cipher->setKey(pack('H*', $this->getKey()));
        $cipher->disablePadding();

        $string = substr(sha1($string), 0, 32);

        return strtoupper(bin2hex($cipher->encrypt(pack('H*', $string))));
    }
}
