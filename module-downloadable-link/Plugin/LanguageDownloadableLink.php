<?php

namespace Pawan\DownloadableLink\Plugin;

class LanguageDownloadableLink
{
    public function afterModifyMeta(
        \Magento\Downloadable\Ui\DataProvider\Product\Form\Modifier\Links $subject,
        $result
    ) {
        $result['downloadable']['children']['container_links']['children']['link']['children']['record']['children']['language'] = [
            'arguments' => [
                'data' => [
                    'config' => $this->getLanguageColumn(),
                ],
            ],
            'sortOrder' => 100,
        ];

        return $result;
    }

    /**
     * Returns language columns configuration
     *
     * @return array
     */
    protected function getLanguageColumn()
    {
        return [
            'label' => __('Language'),
            'formElement' => 'select',
            'componentType' => 'field',
            'dataType' => 'text',
            'dataScope' => 'language',
            'sortOrder' => 8,
            'options' => $this->toOptionArray(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function toOptionArray()
    {
        return [
            ['value' => 'en', 'label' => __('English')],
            ['value' => 'no', 'label' => __('Norwegian')],
        ];
    }
}
