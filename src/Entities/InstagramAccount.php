<?php

namespace Agenciabid\LaravelFacebookAds\Entities;

use Illuminate\Support\Collection;
use Agenciabid\LaravelFacebookAds\Traits\AdFormatter;

/**
 * Class AdAccount.
 */
class InstagramAccount extends AbstractEntity
{
    use AdFormatter;

    /**
     * Get the account ads.
     *
     * @param array $fields
     *
     * @return Collection
     *
     * @see https://developers.facebook.com/docs/marketing-api/reference/adgroup#Reading
     * @throws \Agenciabid\LaravelFacebookAds\Exceptions\MissingEntityFormatter
     */
    public function ads(array $fields = []): Collection
    {
        $ads = $this->response->getAds($fields);

        return $this->format($ads);
    }
}
