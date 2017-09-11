<?php
namespace Joelsonm\Correios\Facades;
use Illuminate\Support\Facades\Facade;
/**
 *
 */
 class Correios extends Facade
 {
     /**
      * Get the registered name of the component.
      *
      * @return string
      */
     protected static function getFacadeAccessor() { return 'Joelsonm\Correios'; }
 }
