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
     * @param int $websiteId
     * @return bool
     */
    public function execute(string $url, int $websiteId = 0): bool;
}
