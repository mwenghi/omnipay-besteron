<?php
namespace Omnipay\Besteron\Message;

/**
 * Besteron Widget Purchase Response
 */
class WidgetPurchaseResponse extends PurchaseResponse
{
    /**
     * {@inheritdoc}
     */
    public function isRedirect()
    {
        return false;
    }

    /**
     * Get required html.
     *
     * @return string
     */
    public function getHtml()
    {
        return '<div class="shop-iframe" id="shop-iframe"></div>';
    }

    /**
     * Get inline script.
     *
     * @return string
     */
    public function getScript()
    {
        $data = \json_encode($this->getData());

        return "
            window.Besteron || (function (d) {
                var s, c, o = besteron = function () { o._.push(arguments) }; o._ = [];
                s = d.getElementsByTagName('script')[0]; c = d.createElement('script');
                c.type = 'text/javascript'; c.charset = 'utf-8'; c.async = false;
                c.src = '" . $this->request->getEndpoint() . "'; s.parentNode.insertBefore(c, s);
            })(document);
            
            window.addEventListener('load', function() {
                var paymentData = " . $data . ";
                var _elm = document.getElementById('shop-iframe');
                window.Besteron.show(document, _elm, paymentData);
            })
        ";
    }

    /**
     * Get external js scripts.
     *
     * @return string[]|array
     */
    public function getExternalScripts()
    {
        return [];
    }

    /**
     * Get external css links.
     *
     * @return string[]
     */
    public function getExternalLinks()
    {
        return [
            'https://client.besteron.com/inline/css/widget.css'
        ];
    }
}
