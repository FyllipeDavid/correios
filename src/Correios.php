<?php

namespace Joelsonm\Correios;

/**
 *
 */
class Correios extends RequestResource
{
    public function calculate($zipcode, $width, $height, $depth, $weight, $diameter = 0)
    {
        $params = [
            'nCdEmpresa' => config()->get('correios.company'),
            'sDsSenha' => config()->get('correios.password'),
            'sCepOrigem' => str_replace('-', '', config()->get('correios.address.zipcode')),
            'sCepDestino' => str_replace('-', '',$zipcode),
            'nVlPeso' => 1,
            'nCdFormato' => 1,
            'nVlComprimento' => $width,
            'nVlAltura' => $height,
            'nVlLargura' => $depth,
            'nVlDiametro' => $diameter,
            'nVlValorDeclarado' => config()->get('correios.options.declared_value'),
            'sCdAvisoRecebimento' => config()->get('correios.options.receipt_notification') == true ? 's' : 'n',
            'StrRetorno' => 'xml',
            'nCdServico' => implode(',', config()->get('correios.services', [])),
            'sCdMaoPropria' => config()->get('correios.options.byhand') == true ? 's' : 'n',
        ];
        
        return $this->getRequest('', $params);
    }
}
