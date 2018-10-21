<?php

namespace Joelsonm\Correios\Responses;

use Joelsonm\Correios\Models\Services;
/**
 *
 */
class Search
{
    public static function response($response)
    {
        return (object)[
            'status' => $response->status,
            'data' => self::getServices($response->data)
        ];
    }

}
