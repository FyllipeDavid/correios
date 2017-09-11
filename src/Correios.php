<?php

namespace Joelsonm\Correios;


use Joelsonm\Correios\Models\Services;

use Joelsonm\Correios\Responses\Calculate;
/**
 *
 */
class Correios extends RequestResource
{
    public function calculate($zipcode, $width, $height, $length, $weight, $diameter = 0)
    {
        $params = [
            'nCdEmpresa' => config()->get('correios.company'),
            'sDsSenha' => config()->get('correios.password'),
            'sCepOrigem' => str_replace('-', '', config()->get('correios.address.zipcode')),
            'sCepDestino' => str_replace('-', '',$zipcode),
            'nVlPeso' => $weight,
            'nCdFormato' => 1,
            'nVlComprimento' => $length,
            'nVlAltura' => $height,
            'nVlLargura' => $width,
            'nVlDiametro' => $diameter,
            'nVlValorDeclarado' => config()->get('correios.options.declared_value'),
            'sCdAvisoRecebimento' => config()->get('correios.options.receipt_notification') == true ? 's' : 'n',
            'StrRetorno' => 'xml',
            'nCdServico' => implode(',', Services::valid(config()->get('correios.services', []))),
            'sCdMaoPropria' => config()->get('correios.options.byhand') == true ? 's' : 'n',
        ];

        if (empty($params['nCdServico'])) {
            throw new \Exception("Nenhum serviço válido disponível");
        }

        return Calculate::response($this->getRequest('http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx', $params));
    }
}
