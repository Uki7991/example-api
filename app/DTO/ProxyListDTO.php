<?php

namespace App\DTO;

use App\DTO\ProxyDTO;
use Illuminate\Contracts\Support\Arrayable;
use JetBrains\PhpStorm\ArrayShape;

class ProxyListDTO implements Arrayable
{
    /**
     * @param array<int, ProxyDTO> $proxies
     */
    public function __construct(
        public readonly array $proxies
    )
    {

    }

    public function toArray()
    {
        return $this->proxies;
    }
}
