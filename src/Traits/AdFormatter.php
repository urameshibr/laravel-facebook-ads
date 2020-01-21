<?php

namespace Agenciabid\LaravelFacebookAds\Traits;

use Agenciabid\LaravelFacebookAds\Entities\Ad;

/**
 * Class AdFormatter.
 */
trait AdFormatter
{
    use Formatter;

    protected $entity = Ad::class;
}
