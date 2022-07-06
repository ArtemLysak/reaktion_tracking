<?php

declare(strict_types=1);

namespace Reaktion\Tracking\ViewModel\Checkout;

use Magento\Checkout\Model\Session as CheckoutSession;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Reaktion\Tracking\Model\Config;

/**
 * View model for quote tracking
 */
class Quote implements ArgumentInterface
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
     * @param Config $config
     * @param CheckoutSession $checkoutSession
     */
    public function __construct(
        Config          $config,
        CheckoutSession $checkoutSession
    ) {
        $this->config = $config;
        $this->checkoutSession = $checkoutSession;
    }

    /**
     * Is enabled
     *
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->config->isEnabled() && $this->config->getTrackingUrl();
    }

    /**
     * Get quote id
     *
     * @return int
     */
    public function getQuoteId(): int
    {
        return (int)$this->checkoutSession->getQuoteId();
    }
}
