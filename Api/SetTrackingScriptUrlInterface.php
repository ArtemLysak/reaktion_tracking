<?php

declare(strict_types=1);

namespace Reaktion\Tracking\Api;

/**
 * Interface SetTrackingScriptUrlInterface
 */
interface SetTrackingScriptUrlInterface
{
    /**
     * Set tracking script url
     *
     * @param string $url
     * @param int $storeId
     * @return bool
     */
    public function execute(string $url, int $storeId = 0): bool;
}
