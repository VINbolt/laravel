<?php

declare(strict_types=1);

namespace Vinbolt\Laravel\Facades;

use Illuminate\Support\Facades\Facade;
use Vinbolt\Sdk\Resources\BrandResource;
use Vinbolt\Sdk\Resources\LeadsResource;
use Vinbolt\Sdk\Resources\MediaResource;
use Vinbolt\Sdk\Resources\PagesResource;
use Vinbolt\Sdk\Resources\SiteResource;
use Vinbolt\Sdk\Resources\TeamResource;
use Vinbolt\Sdk\Resources\VehiclesResource;

/**
 * @property-read PagesResource $pages
 * @property-read SiteResource $site
 * @property-read BrandResource $brand
 * @property-read TeamResource $team
 * @property-read MediaResource $media
 * @property-read LeadsResource $leads
 * @property-read VehiclesResource $vehicles
 *
 * @see \Vinbolt\Sdk\VinboltClient
 */
class Vinbolt extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'vinbolt';
    }
}
