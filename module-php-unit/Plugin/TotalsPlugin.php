<?php

namespace Pawan\PhpUnit\Plugin;

use Magento\Quote\Api\Data\CartInterface;
use Magento\Quote\Api\GuestCartRepositoryInterface;

class TotalsPlugin
{
     /**
     * After get items.
     *
     * @param GuestCartTotalRepositoryInterface $subject
     * @param CartInterface $result
     * @param string $cartId
     * @return CartInterface
     */
    public function afterGet(GuestCartRepositoryInterface $subject, CartInterface $result, $cartId): CartInterface
    {
        // Add log here to test, if it is working
        return $result;
    }
}
