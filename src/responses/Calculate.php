<?php

namespace Joelsonm\Correios\Responses;

use Joelsonm\Correios\Models\Services;
/**
 *
 */
class Calculate
{

    public static function response($response)
    {
        return (object)[
            'status' => $response->data,
            'data' => self::getServices($response->data->cServico)
        ];
    }

    private static function getServices($services)
    {
        $services_ = [];
        foreach ($services as $service) {
            $services_[] = (object)[
                'service' => Services::get($service->Codigo),
                'value_total' => self::numberConvert($service->Valor),
                'value' => self::numberConvert($service->ValorSemAdicionais),
                'receipt_notification_value' => self::numberConvert($service->ValorAvisoRecebimento),
                'byhand_value' => self::numberConvert($service->ValorMaoPropria),
                'declared_value' => self::numberConvert($service->ValorValorDeclarado),
                'delivery_max' => (int) $service->PrazoEntrega,
            ];
        }
        return $services_;
    }

    private static function numberConvert($value, $decimal = 2)
    {
        return (float) number_format(str_replace(',', '.', str_replace('.', '', $value)), $decimal);
    }
}
