<?php

namespace Omnipay\Besteron;

use Omnipay\Omnipay;
use Symfony\Component\HttpFoundation\Request;

class GatewayFactory
{

    private static $gateways = ['redirect' => '', 'widget' => '\Widget', 'bankpay' => '\BankPay'];

    /**
     * @param string $cid
     * @param string $paymentKey
     * @param string $apiKey
     * @param bool $testMode
     * @param Request|null $httpRequest
     * @return Gateway
     */
    public static function createInstance($cid, $paymentKey, $apiKey, $gateway = 'redirect', $testMode = true, $httpRequest = null)
    {
        $gateway = Omnipay::create('Besteron' . self::$gateways[$gateway] ?? '' , null, $httpRequest);
        $gateway->initialize([
            'cid' => $cid,
            'key' => $paymentKey,
            'api_key' => $apiKey,
            'test' => $testMode,
        ]);

        return $gateway;
    }
}
