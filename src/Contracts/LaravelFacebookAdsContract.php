<?php

namespace Agenciabid\LaravelFacebookAds\Contracts;

use Agenciabid\LaravelFacebookAds\FacebookAds;

/**
 * Interface LaravelFacebookAdsContract.
 */
interface LaravelFacebookAdsContract
{
    /**
     * Initialize the Facebook Ads SDK.
     *
     * @param $accessToken
     *
     * @return FacebookAds
     */
    public function init($accessToken): FacebookAds;
}
