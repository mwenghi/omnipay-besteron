<?php
namespace Omnipay\Besteron;

/**
 * Besteron Widget Gateway
 */
class WidgetGateway extends Gateway
{
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