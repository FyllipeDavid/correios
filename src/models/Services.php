<?php
namespace Joelsonm\Correios\Models;
/**
 *
 */
class Services
{
    const SERVICE_PAC_41106                      = '41106';
    const SERVICE_PAC_41068                      = '41068';
    const SERVICE_PAC_04510                      = '04510';
    const SERVICE_PAC_CONTRATO_41211             = '41211';
    const SERVICE_PAC_GRANDES_FORMATOS           = '04693';
    const SERVICE_PAC_REMESSA_AGRUPADA           = '41610';
    const SERVICE_E_SEDEX_STANDARD               = '81019';
    const SERVICE_SEDEX_40010                    = '40010';
    const SERVICE_SEDEX_40096                    = '40096';
    const SERVICE_SEDEX_40436                    = '40436';
    const SERVICE_SEDEX_40444                    = '40444';
    const SERVICE_SEDEX_12                       = '40169';
    const SERVICE_SEDEX_10                       = '40215';
    const SERVICE_SEDEX_10_PACOTE                = '40886';
    const SERVICE_SEDEX_HOJE_40290               = '40290';
    const SERVICE_SEDEX_HOJE_40878               = '40878';
    const SERVICE_SEDEX_A_VISTA                  = '04014';
    const SERVICE_SEDEX_VAREJO_A_COBRAR          = '40045';
    const SERVICE_SEDEX_AGRUPADO                 = '41009';
    const SERVICE_SEDEX_REVERSO                  = '40380';
    const SERVICE_SEDEX_PAGAMENTO_NA_ENTREGA     = '04189';
    const SERVICE_PAC_PAGAMENTO_NA_ENTREGA       = '04685';
    const SERVICE_CARTA_COMERCIAL_A_FATURAR      = '10065';
    const SERVICE_CARTA_REGISTRADA               = '10014';
    const SERVICE_SEDEX_CONTRATO_AGENCIA         = '04162';
    const SERVICE_PAC_CONTRATO_AGENCIA           = '04669';
    const SERVICE_SEDEX_REVERSO_CONTRATO_AGENCIA = '04170';
    const SERVICE_PAC_REVERSO_CONTRATO_AGENCIA   = '04677';
    const SERVICE_CARTA_COMERCIAL_REGISTRADA_CTR_EP_MAQ_FRAN = '10707';
//    const SERVICE_CARTA_REGISTRADA           = '10138';

    private static $services = [
        self::SERVICE_SEDEX_40010                => ['Sedex', 109819],
        self::SERVICE_PAC_41106                  => ['Pac 41106', 109819],
        self::SERVICE_PAC_41068                  => ['Pac 41068', 109819],
        self::SERVICE_PAC_04510                  => ['Pac 04510', 110353],
        self::SERVICE_PAC_CONTRATO_41211         => ['Pac 41211', 113546],
        self::SERVICE_PAC_GRANDES_FORMATOS       => ['Pac Grandes Formatos', 120366],
        self::SERVICE_PAC_REMESSA_AGRUPADA       => ['Pac Remessa Agrupada', 121889],
        self::SERVICE_E_SEDEX_STANDARD           => ['E-Sedex Standard', 104672],
        self::SERVICE_SEDEX_40096                => ['Sedex 40096', 104625],
        self::SERVICE_SEDEX_40436                => ['Sedex 40436', 109810],
        self::SERVICE_SEDEX_40444                => ['Sedex 40444', 109811],
        self::SERVICE_SEDEX_12                   => ['Sedex 12', 115218],
        self::SERVICE_SEDEX_10                   => ['Sedex 10', 104707],
        self::SERVICE_SEDEX_10_PACOTE            => ['Sedex 10 Pacote', null],
        self::SERVICE_SEDEX_HOJE_40290           => ['Sedex Hoje 40290', 108934],
        self::SERVICE_SEDEX_HOJE_40878           => ['Sedex Hoje 40878', null],
        self::SERVICE_SEDEX_A_VISTA              => ['Sedex a vista', 104295],
        self::SERVICE_SEDEX_VAREJO_A_COBRAR      => ['Sedex Varejo a Cobrar', null],
        self::SERVICE_SEDEX_AGRUPADO             => ['Sedex Agrupado', 119461],
        self::SERVICE_SEDEX_REVERSO              => ['Sedex Reverso', 109806],
        self::SERVICE_SEDEX_PAGAMENTO_NA_ENTREGA => ['Sedex Pagamento na Entrega', 114976],
        self::SERVICE_PAC_PAGAMENTO_NA_ENTREGA   => ['PAC Pagamento na Entrega', 114976],
        self::SERVICE_CARTA_COMERCIAL_A_FATURAR  => ['Carta Comercial a Faturar', 109480],
        self::SERVICE_CARTA_REGISTRADA           => ['Carta Registrada', 116985],
        self::SERVICE_CARTA_COMERCIAL_REGISTRADA_CTR_EP_MAQ_FRAN           => ['Carta Comercial Registrada CTR EP MÁQ FRAN', 120072],
        self::SERVICE_SEDEX_CONTRATO_AGENCIA     => ['SEDEX Contrato Agência', 124849],
        self::SERVICE_PAC_CONTRATO_AGENCIA       => ['PAC Contrato Agência', 124884],
        self::SERVICE_SEDEX_REVERSO_CONTRATO_AGENCIA => ['SEDEX Reverso Contrato Agência', 124849],
        self::SERVICE_PAC_REVERSO_CONTRATO_AGENCIA   => ['PAC Reverso Contrato Agência', 124884],
    ];

    public static function get($id){

        if (!isset(self::$services[$id]))
            return null;

        return (object)[
            'id' => $id,
            'name' => self::$services[$id][0]
        ];
    }

    public static function valid($list)
    {
        $services_ = [];
        foreach ($list as $service_id) {
            if (isset(self::$services[$service_id]))
                $services_[] = $service_id;
        }
        return $services_;
    }
}
