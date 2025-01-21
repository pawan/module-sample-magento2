<?php

namespace Pawan\ShippingFilter\Plugin;

use Magento\OfflineShipping\Model\Carrier\Flatrate;
use Magento\Quote\Model\Quote\Address\RateRequest;
use Psr\Log\LoggerInterface;

class FlatrateFilterPlugin
{
    /**
     * @var LoggerInterface
     */
    private $logger;
    /**
     * @param LoggerInterface $logger
     */
    public function __construct(
        LoggerInterface $logger
    ) {
        $this->logger = $logger;
    }
    /**
     * @inheritdoc
     */
    public function afterCollectRates(Flatrate $subject, $result, RateRequest $request)
    {
        //Only debug purpose start
        $this->logger->info('afterCollectRates');
        $this->logger->info("request", $request->getData());
        $this->logger->info("city =".$request->getDestCity());
        $this->logger->info("subject", $subject->getData());
        $this->logger->info("result", $result->asArray());
        //Only debug purpose ends
        if ($request->getDestCity()=="Some check") {
            return false;
        }
        return $result;
    }
}
