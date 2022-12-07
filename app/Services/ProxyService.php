<?php

namespace App\Services;

use App\Contracts\ProxyProviderContract;
use App\DTO\ProxyDTO;
use App\DTO\ProxyExportParamsDTO;
use App\DTO\ProxyListDTO;
use App\Exports\ProxyExport;
use App\ProxyProviders\ExampleProvider;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ProxyService
{
    /**
     * @param ProxyProviderContract $provider
     * @return ProxyListDTO
     */
    public function getAll(ProxyProviderContract $provider): ProxyListDTO
    {
        return new ProxyListDTO($provider->getProxies());
    }

    /**
     * @param ProxyExportParamsDTO $paramsDTO
     * @param ProxyProviderContract $provider
     * @return BinaryFileResponse
     */
    public function export(ProxyExportParamsDTO $paramsDTO, ProxyProviderContract $provider): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        return Excel::download(new ProxyExport($provider->dataForExport($paramsDTO)), 'proxies.csv', \Maatwebsite\Excel\Excel::CSV);
    }
}
