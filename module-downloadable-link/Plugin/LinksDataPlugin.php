<?php

namespace Pawan\DownloadableLink\Plugin;

use Magento\Downloadable\Ui\DataProvider\Product\Form\Modifier\Data\Links;
use Psr\Log\LoggerInterface;
use Magento\Catalog\Model\Locator\LocatorInterface;

class LinksDataPlugin
{
    private $logger;

    /**
     * @var LocatorInterface
     */
    protected $locator;

    public function __construct(
        LocatorInterface $locator,
        LoggerInterface $logger
    )
    {
        $this->locator = $locator;
        $this->logger = $logger;
    }

    public function beforeGetLinksData(
        Links $subject
    ) {
        //$subject->getLinksData();
    }

    public function afterGetLinksData(
        Links $subject,
        $result
    ) {
        
        $this->logger->info('before result', $result);

        foreach ($result as $key => $value) {
            $result[$key]['language'] = 'no';
        }

        $this->logger->info('after result', $result);

        return $result;
    }
}
