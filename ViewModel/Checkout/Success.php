<?php

declare(strict_types=1);

namespace Reaktion\Tracking\ViewModel\Checkout;

use Magento\Checkout\Model\Session as CheckoutSession;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Sales\Api\Data\OrderInterface;
use Magento\Sales\Api\OrderRepositoryInterface;
use Reaktion\Tracking\Model\Config;

/**
 * View model for checkout success tracking script
 */
class Success implements ArgumentInterface
{
    /**
     * @var Config
     */
    private $config;

    /**
     * @var CheckoutSession
     */
    private $checkoutSession;

    /**
     * @var OrderRepositoryInterface
     */
    private $orderRepository;

    /**
     * Success constructor.
     *
     * @param Config $config
     * @param CheckoutSession $checkoutSession
     * @param OrderRepositoryInterface $orderRepository
     */
    public function __construct(
        Config $config,
        CheckoutSession $checkoutSession,
        OrderRepositoryInterface $orderRepository
    ) {
        $this->config = $config;
        $this->checkoutSession = $checkoutSession;
        $this->orderRepository = $orderRepository;
    }

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->config->isEnabled() && $this->config->getTrackingIdentifier();
    }

    /**
     * @return int|null
     */
    public function getLastQuoteId(): ?int
    {
        $order = $this->getOrder();
        if ($order) {
            return (int)$order->getQuoteId();
        }

        return null;
    }

    /**
     * @return int|null
     */
    public function getLastOrderId(): ?int
    {
        $order = $this->getOrder();
        if ($order) {
            return (int)$order->getEntityId();
        }

        return null;
    }

    /**
     * @return OrderInterface|null
     */
    private function getOrder(): ?OrderInterface
    {
        $lastOrderId = $this->checkoutSession->getLastOrderId();
        if ($lastOrderId) {
            return $this->orderRepository->get((int)$lastOrderId);
        }

        return null;
    }
}
