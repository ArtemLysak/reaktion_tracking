<?php

declare(strict_types=1);

namespace Reaktion\Tracking\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

/**
 * Module config
 */
class Config
{
    public const XML_PATH_ENABLED = 'reaktion_tracking/general/enabled';
    public const XML_PATH_TRACKING_URL = 'reaktion_tracking/general/tracking_url';

    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * Config constructor.
     *
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * Is enabled
     *
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->scopeConfig->isSetFlag(self::XML_PATH_ENABLED, ScopeInterface::SCOPE_STORES);
    }

    /**
     * Get tracking url
     *
     * @return string|null
     */
    public function getTrackingUrl(): ?string
    {
        return $this->scopeConfig->getValue(self::XML_PATH_TRACKING_URL, ScopeInterface::SCOPE_STORES);
    }
}
