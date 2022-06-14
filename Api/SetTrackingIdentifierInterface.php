<?php

declare(strict_types=1);

namespace Reaktion\Tracking\Api;

/**
 * Interface SetTrackingIdentifierInterface
 */
interface SetTrackingIdentifierInterface
{
    /**
     * @param string $identifier
     * @param int $storeId
     * @return bool
     */
    public function execute(string $identifier, int $storeId = 0): bool;
}
