<?php

declare(strict_types=1);

namespace Reaktion\Tracking\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Config\Storage\WriterInterface;
use Magento\Store\Model\ScopeInterface;
use Reaktion\Tracking\Api\SetTrackingIdentifierInterface;

/**
 * Set tracking identifier via rest api
 */
class SetTrackingIdentifier implements SetTrackingIdentifierInterface
{
    /**
     * @var WriterInterface
     */
    private $configWriter;

    /**
     * SetTrackingIdentifier constructor.
     *
     * @param WriterInterface $configWriter
     */
    public function __construct(WriterInterface $configWriter)
    {
        $this->configWriter = $configWriter;
    }

    /**
     * @inheritDoc
     */
    public function execute(string $identifier, int $storeId = 0): bool
    {
        $this->configWriter->save(
            Config::XML_PATH_TRACKING_IDENTIFIER,
            $identifier,
            ($storeId ? ScopeInterface::SCOPE_STORES : ScopeConfigInterface::SCOPE_TYPE_DEFAULT),
            $storeId
        );
        return true;
    }
}
