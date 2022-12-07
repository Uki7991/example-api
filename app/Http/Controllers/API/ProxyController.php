<?php

namespace App\Http\Controllers\API;

use App\DTO\ProxyExportParamsDTO;
use App\DTO\ProxyListDTO;
use App\Exports\ProxyExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProxyExportRequest;
use App\ProxyProviders\ExampleProvider;
use App\Services\ProxyService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;


class ProxyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response|ProxyListDTO
     */
    public function index(Request $request, ProxyService $service): \Illuminate\Http\Response|ProxyListDTO
    {
        return $service->getAll(new ExampleProvider);
    }

    /**
     * @param ProxyExportRequest $request
     * @param ProxyService $service
     * @return BinaryFileResponse
     */
    public function export(ProxyExportRequest $request, ProxyService $service): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        $paramsDTO = new ProxyExportParamsDTO($request->get('format'));

        return $service->export($paramsDTO, new ExampleProvider());
    }
}
