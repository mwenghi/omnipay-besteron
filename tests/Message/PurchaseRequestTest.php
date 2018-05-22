<?php
namespace Omnipay\Besteron\Message;

use Omnipay\Tests\TestCase;

class PurchaseRequestTest extends TestCase
{
    public function setUp()
    {
        $this->request = new PurchaseRequest($this->getHttpClient(), $this->getHttpRequest());

        $this->request->initialize([
            'cid' => '1263548227',
            'key' => 'd05a0be025d4544ed4df13e86d02ed6165aff7d8f7bf4c78f41a6d0c8e25660c',
            'type' => 'UNIPAY',
            'amount' => 100.0,
            'lang' => 'SK',
            'transactionId' => '12345',
            'returnUrl' => 'https://www.rshop.sk',
            'card' => [
                'email' => 'email@email.com',
            ],
            'test' => true
        ]);
    }

    public function testGetData()
    {
        $this->assertSame('https://client.besteron.com/public/virtual-payment/request/', $this->request->getEndpoint());

        $data = $this->request->getData();

        $this->assertSame('100.00', $data['amnt']);
        $this->assertSame('0B577883BED02464C4A3FFDE5E60D147', $data['sign']);
    }
}
