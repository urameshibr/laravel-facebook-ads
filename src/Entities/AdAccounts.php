<?php

namespace Agenciabid\LaravelFacebookAds\Entities;

use FacebookAds\Object\AdAccount;
use Illuminate\Support\Collection;
use Agenciabid\LaravelFacebookAds\Traits\HasAccountUser;
use Agenciabid\LaravelFacebookAds\Traits\AdAccountFormatter;

/**
 * Class AdAccounts.
 */
class AdAccounts
{
    use AdAccountFormatter,
        HasAccountUser;

    /**
     * List all user's ads accounts.
     *
     * @param array $fields
     * @param string $accountId
     *
     * @return Collection
     *
     * @throws \Agenciabid\LaravelFacebookAds\Exceptions\MissingEntityFormatter
     * @see https://developers.facebook.com/docs/marketing-api/reference/ad-account
     */
    public function all(array $fields = [], $accountId = 'me'): Collection
    {
        return $this->format(
            $this->accountUser($accountId)->getAdAccounts($fields)
        );
    }

    /**
     * @param array $fields
     * @param $accountId
     *
     * @return Collection
     * @throws \Agenciabid\LaravelFacebookAds\Exceptions\MissingEntityFormatter
     * @see https://developers.facebook.com/docs/marketing-api/reference/ad-account
     */
    public function get(array $fields, $accountId)
    {
        return $this->format(
            (new AdAccount($accountId))->getSelf($fields)
        );
    }
}
