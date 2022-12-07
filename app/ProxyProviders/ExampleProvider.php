<?php

namespace App\ProxyProviders;

use App\Contracts\ProxyProviderContract;
use App\DTO\ProxyExportParamsDTO;
use Faker\Factory;
use App\DTO\ProxyDTO;

class ExampleProvider extends AbstractProvider implements ProxyProviderContract
{
    /**
     * @param ProxyExportParamsDTO $paramsDTO
     * @return array
     */
    public function dataForExport(ProxyExportParamsDTO $paramsDTO): array
    {
        $proxies = $this->getProxies();

        return $this->transformByParams($paramsDTO, $proxies);
    }
}
