<?php
namespace Omnipay\Besteron\Message;

use Omnipay\Common\Message\AbstractResponse;

/**
 * Besteron CheckStatus Response
 */
class CheckStatusResponse extends AbstractResponse
{
    /**
     * Is the response successful?
     *
     * @return boolean
     */
    public function isSuccessful()
    {
        return isset($this->data['resultCode']) && $this->data['resultCode'] == 'OK' && isset($this->data['payments']) && $this->data['payments'];
    }

    /**
     * Get the transaction ID
     *
     * @return string
     */
    public function getTransactionId()
    {
        return isset($this->data['vs']) ? $this->data['vs'] : null;
    }

    /**
     * Get the transaction reference
     *
     * @return string
     */
    public function getTransactionReference()
    {
        return isset($this->data['vs']) ? $this->data['vs'] : null;
    }

    /**
     * Response Message
     *
     * @return null|string
     */
    public function getMessage()
    {
        return isset($this->data['resultMessage']) ? $this->data['resultMessage'] : null;
    }
}
