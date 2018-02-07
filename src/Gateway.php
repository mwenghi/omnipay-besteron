<?php
namespace Omnipay\Besteron;

use Omnipay\Common\AbstractGateway;

/**
 * Besteron Gateway
 */
class Gateway extends AbstractGateway
{
    /**
     * Gateway name
     *
     * @return string
     */
    public function getName()
    {
        return 'Besteron';
    }

    /**
     * Get default parameters
     *
     * @return array
     */
    public function getDefaultParameters()
    {
        return [
            'lang' => 'SK',
            'test' => true
        ];
    }

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
     * Create a purchase request
     *
     * @param array $parameters
     * @return \Omnipay\Besteron\Message\PurchaseRequest
     */
    public function purchase(array $parameters = [])
    {
        return $this->createRequest('\Omnipay\Besteron\Message\PurchaseRequest', $parameters);
    }

    /**
     * Create a complete purchase request
     *
     * @param array $parameters
     * @return \Omnipay\Besteron\Message\CompletePurchaseRequest
     */
    public function completePurchase(array $parameters = [])
    {
        return $this->createRequest('\Omnipay\Besteron\Message\CompletePurchaseRequest', $parameters);
    }

    /**
     * Create a check status request
     *
     * @param array $parameters
     * @return \Omnipay\Besteron\Message\CheckStatusRequest
     */
    public function checkStatus(array $parameters = [])
    {
        return $this->createRequest('\Omnipay\Besteron\Message\CheckStatusRequest', $parameters);
    }
}
