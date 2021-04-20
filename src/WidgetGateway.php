<?php
namespace Omnipay\Besteron;

/**
 * Besteron Widget Gateway
 */
class WidgetGateway extends Gateway
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
     * Create a purchase request
     *
     * @param array $parameters
     * @return \Omnipay\Besteron\Message\BankPayPurchaseRequest
     */
    public function purchase(array $parameters = [])
    {
        return $this->createRequest('\Omnipay\Besteron\Message\WidgetPurchaseRequest', $parameters);
    }

    /**
     * Create a complete purchase request
     *
     * @param array $parameters
     */
    public function completePurchase(array $parameters = [])
    {
        return $this->createRequest('\Omnipay\Besteron\Message\CompletePurchaseRequest', $parameters);

    }
}