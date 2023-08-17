<?php

namespace Pawan\PhpUnit\Plugin\Test\Unit\Plugin;

use PHPUnit\Framework\TestCase;
use Magento\Quote\Api\Data\CartInterface;
use Magento\Quote\Api\GuestCartRepositoryInterface;
use Pawan\PhpUnit\Plugin\TotalsPlugin;

class TotalsPluginTest extends TestCase
{
    private $totalsPlugin;
    private $cartInterfaceMock;
    private $guestCartRepositoryInterfaceMock;

    protected function setUp(): void
    {
        $this->guestCartRepositoryInterfaceMock = $this->createMock(GuestCartRepositoryInterface::class);
        $this->cartInterfaceMock = $this->createMock(CartInterface::class);
        $this->totalsPlugin = new TotalsPlugin();
    }

    public function testAfterGet()
    {
        $cartId = "1234";

        $this->cartInterfaceMock->method('getId')
            ->willReturn($cartId);

        $this->guestCartRepositoryInterfaceMock->expects($this->once())
            ->method('get')
            ->with($cartId)
            ->willReturn($this->cartInterfaceMock);

        $this->cartInterfaceMock->expects($this->once())
            ->method('getId')
            ->willReturn($cartId);

        // TODO: Add log assertion here

        $result = $this->totalsPlugin->afterGet(
            $this->guestCartRepositoryInterfaceMock,
            $this->cartInterfaceMock,
            $cartId
        );

        $this->assertEquals($this->cartInterfaceMock, $result);
    }
}
