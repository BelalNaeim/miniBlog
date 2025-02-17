<?php
namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{

    protected $apiNamespace = 'App\Http\Controllers\Api';

    public const HOME = '/home';

    public function boot ()
    {
        parent::boot();
    }

    public function map ()
    {
        $this->mapApiRoutes();
    }


    protected function mapApiRoutes ()
    {
        Route::prefix( 'api' )
            ->middleware( [ 'api'] )
            ->namespace( $this->apiNamespace )
            ->group( base_path( 'routes/api.php' ) );
    }







}
