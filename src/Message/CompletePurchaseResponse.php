<?php
namespace Omnipay\Besteron\Message;

use Omnipay\Common\Message\AbstractResponse;

/**
 * Besteron CompletePurchase Response
 */
class CompletePurchaseResponse extends AbstractResponse
{
    /**
     * Is the response successful?
     *
     * @return boolean
     */
    public function isSuccessful()
    {
        return isset($this->data['RESULT']) && $this->data['RESULT'] == 'OK';
    }

    /**
     * Get the transaction ID
     *
     * @return string
     */
    public function getTransactionId()
    {
        return isset($this->data['VS']) ? $this->data['VS'] : null;
    }

    /**
     * Get the transaction reference
     *
     * @return string
     */
    public function getTransactionReference()
    {
        return isset($this->data['VS']) ? $this->data['VS'] : null;
    }

    /**
     * Response Message
     *
     * @return null|string
     */
    public function getMessage()
    {
        return isset($this->data['RESULT']) ? $this->data['RESULT'] : null;
    }
}
