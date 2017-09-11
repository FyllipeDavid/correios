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
            'status' => $response->status,
            'data' => self::getServices($response->data->cServico),
            'errors' => self::getErrors($response->data->cServico)
        ];
    }

    private static function getErrors($services)
    {
        $errors = [];
        foreach ($services as $service) {
            if ($service->Erro != 0) {
                $errors[] = $service->MsgErro ? "$service->Codigo: $service->MsgErro" : "$service->Codigo: $service->Erro";
            }
        }
        return $errors;
    }

    private static function getServices($services)
    {
        $services_ = [];
        foreach ($services as $service) {

            if ($service->Erro == 0) {
                $s = [
                    'service' => Services::get($service->Codigo),
                    'value_total' => self::numberConvert($service->Valor),
                    'value' => self::numberConvert($service->ValorSemAdicionais),
                    'receipt_notification_value' => self::numberConvert($service->ValorAvisoRecebimento),
                    'byhand_value' => self::numberConvert($service->ValorMaoPropria),
                    'declared_value' => self::numberConvert($service->ValorValorDeclarado),
                    'saturday_delivery' => strtolower($service->EntregaSabado) == 's' ? true : false,
                    'delivery_max' => (int) $service->PrazoEntrega
                ];

                if ($s['saturday_delivery'] == true) {
                    $delivery_forecast = \Carbon\Carbon::today()->addDay($s['delivery_max']);
                    if ($delivery_forecast->dayOfWeek == 0) {
                        $delivery_forecast = \Carbon\Carbon::today()->addDay($s['delivery_max'])->addDay();
                    }
                }else{
                    $delivery_forecast = \Carbon\Carbon::today()->addWeekday($s['delivery_max']);
                }

                $s['delivery_forecast'] = $delivery_forecast->format('Y-m-d');

                $services_[] = (object) $s;
            }

        }

        return $services_;
    }

    private static function numberConvert($value, $decimal = 2)
    {
        return (float) number_format(str_replace(',', '.', str_replace('.', '', $value)), $decimal);
    }
}
