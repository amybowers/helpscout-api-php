<?php

declare(strict_types=1);

namespace HelpScout\Api;

use HelpScout\Api\Http\Auth\HandlesTokenRefreshes;
use HelpScout\Api\Http\RestClientBuilder;

class ApiClientFactory
{
    /**
     * @param array                             $config
     * @param \Closure|HandlesTokenRefreshes   $tokenRefreshedCallback
     */
    public static function createClient(
        array $config = [],
        $tokenRefreshedCallback = null
    ): ApiClient {
        $restClientBuilder = new RestClientBuilder($config);

        return new ApiClient($restClientBuilder->build($tokenRefreshedCallback));
    }
}
