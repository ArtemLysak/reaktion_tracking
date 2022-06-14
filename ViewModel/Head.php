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
     * Head constructor.
     *
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->config->isEnabled() && $this->config->getTrackingIdentifier();
    }

    /**
     * @return string
     */
    public function getTrackingIdentifier(): string
    {
        return $this->config->getTrackingIdentifier() ?? '';
    }
}
