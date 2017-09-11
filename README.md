# API DE CALCULO DOS CORREIOS PARA LARAVEL 5.*

### Baixar pacote necessário

```
  composer require joelsonm/correios
```

### Registrar providers e facades no config/app.php

Provider

```
  Joelsonm\Correios\Providers\CorreiosServiceProvider::class
```
Facades
```
  'Correios' => \Joelsonm\Correios\Facades\Correios::class
```

### Publicando arquivo de configuração

```
  php artisan vendor:publish
```

### Configurando
Configure os dados no arquivo config/correios.php

## USANDO

```
  Correios::calculate(CEP, LARGURA, ALTURA, COMPRIMENTO, PESO)
```
