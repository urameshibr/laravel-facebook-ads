<?php

namespace LaravelFacebookAds\Tests;

use Illuminate\Support\Collection;
use Orchestra\Testbench\TestCase;
use Edbizarro\LaravelFacebookAds\FacebookAds;
use Edbizarro\LaravelFacebookAds\Providers\LaravelFacebookServiceProvider;
use Mockery as m;

/**
 * Class BaseTest.
 */
abstract class BaseTest extends TestCase
{
    /**
     * @var FacebookAds
     */
    protected $laravelFacebookAds;

    public function tearDown()
    {
        parent::tearDown();
        m::close();
    }

    public function setUp()
    {
        $this->createAdUserMock();
        $this->createSdkAdAccountMock();
        parent::setUp();
    }

    /**
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [LaravelFacebookServiceProvider::class];
    }

    /**
     * @return FacebookAds
     */
    protected function createFacebookAdsInstance()
    {
        return new FacebookAds(
            $this->createAdAccountsMock(),
            $this->createInsightsMock()
        );
    }

    /**
     * @return m\MockInterface
     */
    protected function createAdAccountsMock()
    {
        $adAccounts = m::mock(
            'Edbizarro\LaravelFacebookAds\Services\AdAccounts[response]',
            []
        );

        $adAccounts
            ->shouldReceive('response')
            ->withAnyArgs()
            ->andReturn((new Collection()));

        return $adAccounts;
    }

    /**
     * @return m\MockInterface
     */
    protected function createInsightsMock()
    {
        $insights = m::mock('Edbizarro\LaravelFacebookAds\Services\Insights\Insights[response]');

        $insights
            ->shouldReceive('response')
            ->withAnyArgs()
            ->andReturn((new Collection()));

        return $insights;
    }

    protected function createSdkAdAccountMock()
    {
        $fbAdAccount = m::mock('overload:FacebookAds\Object\AdAccount');
        $fbAdAccount
            ->shouldReceive('getAds')
            ->withAnyArgs();

        $fbAdAccount
            ->shouldReceive('getInsights')
            ->withAnyArgs();

        return $fbAdAccount;
    }
    /**
     * @return m\MockInterface
     */
    protected function createAdUserMock()
    {
        $adUser = m::mock('overload:FacebookAds\Object\AdUser');

        $adUser
            ->shouldReceive('getAdAccounts')
            ->withAnyArgs();

        return $adUser;
    }
}
