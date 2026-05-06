# vinbolt/laravel

Laravel integration for the [VINbolt PHP SDK](../php/README.md).

Provides a service provider, facade, and config file so you can call the
VINbolt headless API directly from Laravel apps.

## Install

```bash
composer require vinbolt/laravel
```

The service provider auto-registers via Laravel's package discovery.

## Configure

Set your API key in `.env`:

```dotenv
VINBOLT_API_KEY=pk_live_xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
VINBOLT_BASE_URL=https://vinbolt.com/api/v1
```

(Optional) publish the config file to customize:

```bash
php artisan vendor:publish --tag=vinbolt-config
```

## Usage

### Facade

```php
use Vinbolt\Laravel\Facades\Vinbolt;

$home    = Vinbolt::pages->get('home');
$header  = Vinbolt::site->header();
$brand   = Vinbolt::brand->get();
$cars    = Vinbolt::vehicles->list(['make' => 'Honda']);

Vinbolt::leads->create([
    'email'       => 'shopper@example.com',
    'name'        => 'Jane Doe',
    'vehicle_vin' => '1HGCM82633A123456',
]);
```

### Dependency injection

```php
use Vinbolt\Sdk\VinboltClient;

class HomeController
{
    public function __construct(private VinboltClient $vinbolt) {}

    public function show()
    {
        return view('home', [
            'page'   => $this->vinbolt->pages->get('home'),
            'header' => $this->vinbolt->site->header(),
        ]);
    }
}
```

## Resources

See the [PHP SDK README](../php/README.md) for the full resource list — this package
is a pure Laravel wrapper, all methods come from `vinbolt/sdk`.
