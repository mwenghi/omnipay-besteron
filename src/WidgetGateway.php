<?php
namespace Omnipay\Besteron;

/**
 * Besteron Widget Gateway
 */
class WidgetGateway extends Gateway
{
    /**
     * Payment method getter.
     *
     * @return string
     */
    public function getPaymentMethod()
    {
        return $this->getParameter('paymentMethod');
    }

    /**
     * Payment method setter.
     *
     * @param string $paymentMethod
     *
     * @return WidgetGateway
     */
    public function setPaymentMethod($paymentMethod)
    {
        return $this->setParameter('paymentMethod', $paymentMethod);
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