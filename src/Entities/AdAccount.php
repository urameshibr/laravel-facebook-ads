<?php

namespace Agenciabid\LaravelFacebookAds\Entities;

use Illuminate\Support\Collection;
use Agenciabid\LaravelFacebookAds\Traits\AdFormatter;

/**
 * Class AdAccount.
 */
class AdAccount extends AbstractEntity
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
        return $this->format(
            $this->response->getAds($fields)
        );
    }
}
