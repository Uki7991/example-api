<?php

namespace App\ProxyProviders;

use App\Contracts\ProxyProviderContract;
use App\DTO\ProxyDTO;
use App\DTO\ProxyExportParamsDTO;
use Faker\Factory;

abstract class AbstractProvider implements ProxyProviderContract
{
    /**
     * @return array
     */
    public function getProxies(): array
    {
        $faker = Factory::create();
        $proxies = [];
        $rand = rand(10, 100);

        for ($i = 0; $i < $rand; $i++) {
            $proxies[] = new ProxyDTO($faker->ipv4(), $faker->numberBetween(1000, 9999), $faker->word(), $faker->password());
        }

        return $proxies;
    }

    /**
     * @param ProxyExportParamsDTO $paramsDTO
     * @param array<int, ProxyDTO> $proxies
     * @return array
     */
    protected function transformByParams(ProxyExportParamsDTO $paramsDTO, array $proxies): array
    {
        return collect($proxies)->map(function (ProxyDTO $proxy) use ($paramsDTO) {
            $format = $paramsDTO->format;

            foreach ($paramsDTO->getParamsArray() as $param) {
                $format = str_replace($param, $proxy->$param, $format);
            }

            return $format;
        })->toArray();
    }
}
