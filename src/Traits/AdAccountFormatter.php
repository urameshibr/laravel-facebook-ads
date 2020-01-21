<?php

namespace Agenciabid\LaravelFacebookAds\Traits;

use Agenciabid\LaravelFacebookAds\Entities\AdAccount;

/**
 * Class AdAccountFormatter.
 */
trait AdAccountFormatter
{
    use Formatter;

    protected $entity = AdAccount::class;
}
