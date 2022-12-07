<?php

namespace Services;

use App\DTO\ProxyExportParamsDTO;
use App\DTO\ProxyListDTO;
use App\ProxyProviders\ExampleProvider;
use App\Services\ProxyService;
use PHPUnit\Framework\TestCase;

class ProxyServiceTest extends TestCase
{
    public function testGetAll()
    {
        $provider = new ExampleProvider();
        $service = new ProxyService();

        $this->assertInstanceOf(ProxyListDTO::class, $service->getAll($provider));
    }
}
