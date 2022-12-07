<?php

namespace ProxyProviders;

use App\DTO\ProxyDTO;
use App\DTO\ProxyExportParamsDTO;
use App\ProxyProviders\ExampleProvider;
use PHPUnit\Framework\TestCase;

class ExampleProviderTest extends TestCase
{

    public function testGetProxies()
    {
        $provider = new ExampleProvider();

        $this->assertIsArray($provider->getProxies());
        $this->assertContainsOnlyInstancesOf(ProxyDTO::class, $provider->getProxies());
    }

    public function testDataForExport()
    {
        $provider = new ExampleProvider();
        $data = $provider->dataForExport(new ProxyExportParamsDTO('ip'));

        $this->assertIsArray($data);
        $this->assertContainsOnly('string', $data);
    }
}
