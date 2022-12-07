<?php

namespace App\Contracts;

use App\DTO\ProxyDTO;
use App\DTO\ProxyExportParamsDTO;

interface ProxyProviderContract
{
    /**
     * @return array<int, ProxyDTO>
     */
    public function getProxies(): array;

    /**
     * @param ProxyExportParamsDTO $paramsDTO
     * @return array
     */
    public function dataForExport(ProxyExportParamsDTO $paramsDTO): array;
}
