<?php
namespace Pawan\ShippingSample\Observer\Cart;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class AddShipping implements ObserverInterface
{
  public function execute(Observer $observer)
  {
  	
        $quote = $observer->getCart()->getQuote();
        $shippingAddress = $quote->getShippingAddress();
        if (!$shippingAddress->getShippingMethod()) {
            $shippingAddress->setShippingMethod('flatrate_flatrate');
            $shippingAddress->setCollectShippingRates(true)->collectShippingRates();
        }
  }
}