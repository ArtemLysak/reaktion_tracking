<?php

declare(strict_types=1);

namespace Reaktion\Tracking\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Reaktion\Tracking\Model\Config;

/**
 * View model for head tracking script
 */
class Head implements ArgumentInterface
{
    /**
     * @var Config
     */
    private $config;

    /**
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * Is enabled
     *
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->config->isEnabled() && $this->getTrackingUrl();
    }

    /**
     * Get tracking url
     *
     * @return string
     */
    public function getTrackingUrl(): string
    {
        return $this->config->getTrackingUrl() ?? '';
    }
}
