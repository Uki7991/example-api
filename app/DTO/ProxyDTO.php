<?php

namespace App\DTO;

class ProxyDTO 
{
    public function __construct(public readonly string $ip, public readonly int $port, public readonly string $login, public readonly string $password)
    {
        
    }
}