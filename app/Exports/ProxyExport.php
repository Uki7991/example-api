<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProxyExport implements FromCollection
{
    public function __construct(protected array $proxies)
    {
    }

    /**
     * @return Collection
     */
    public function collection(): \Illuminate\Support\Collection
    {
        return collect($this->proxies)->sliding(1);
    }
}
