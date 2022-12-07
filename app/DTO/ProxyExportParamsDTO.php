<?php

namespace App\DTO;

class ProxyExportParamsDTO
{
    private array $paramsArray;

    public function __construct(public readonly string $format)
    {
        $this->resolve();
    }

    private function resolve()
    {
        $re = '/(?\'ip\'ip):?(?\'port\'port)?@?(?\'login\'login)?:?(?\'password\'password)?/m';

        if (preg_match_all($re, $this->format, $matches, PREG_SET_ORDER, 0)) {
            $matches = array_filter($matches[0], function ($key) {
                return !is_numeric($key);
            }, ARRAY_FILTER_USE_KEY);

            foreach ($matches as $match) {
                if ($match) {
                    $this->paramsArray[] = $match;
                }
            }
        }
    }

    /**
     * @return array
     */
    public function getParamsArray(): array
    {
        return $this->paramsArray;
    }
}
