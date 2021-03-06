<?php

declare(strict_types=1);

namespace Reaktion\Tracking\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Config\Storage\WriterInterface;
use Magento\Store\Model\ScopeInterface;
use Reaktion\Tracking\Api\SetTrackingScriptUrlInterface;

/**
 * Set tracking identifier via rest api
 */
class SetTrackingScriptUrl implements SetTrackingScriptUrlInterface
{
    /**
     * @var WriterInterface
     */
    private $configWriter;

    /**
     * @param WriterInterface $configWriter
     */
    public function __construct(WriterInterface $configWriter)
    {
        $this->configWriter = $configWriter;
    }

    /**
     * @inheritDoc
     */
    public function execute(string $url, int $websiteId = 0): bool
    {
        $this->configWriter->save(
            Config::XML_PATH_TRACKING_URL,
            $url,
            ($websiteId ? ScopeInterface::SCOPE_WEBSITES : ScopeConfigInterface::SCOPE_TYPE_DEFAULT),
            $websiteId
        );
        return true;
    }
}
