<?php

namespace Pawan\ShippingSample\Plugin;

class DisableShipping
{
    protected $logger;

    public function __construct(\Psr\Log\LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function aroundCollectCarrierRates(
        \Magento\Shipping\Model\Shipping $subject,
        \Closure $proceed,
        $carrierCode,
        $request
    )
    {
        // Enter Shipping Code here instead of 'freeshipping'
        if ($carrierCode == 'flatrate' && $this->test($request)) {
           // To disable the shipping method return false
            return false;
        } 
        // To enable the shipping method
        return $proceed($carrierCode, $request);
    }

    public function test($request){
        $allItems = $request->getAllItems();
        $weightItems = array();

        /** @var $item \Magento\Quote\Model\Quote\Item */
        foreach ($allItems as $item) {
            //$weightItems[] = $item->getId();
            array_push($weightItems,$item->getWeight());
            $product = $item->getProduct();
            $this->logger->info($item->getProduct()->getDisableFreeShipping());
            $this->logger->info($product->getData('disable_free_shipping'));
        }
        if(in_array(14, $weightItems)){
            return true;
        }
        return false;
    }
}