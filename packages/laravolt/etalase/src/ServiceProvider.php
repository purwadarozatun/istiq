<?php

namespace Laravolt\Etalase;

use App\User;
use Faker\Factory;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

/**
 * Class PackageServiceProvider
 *
 * @package Laravolt\Ui
 * @see http://laravel.com/docs/master/packages#service-providers
 * @see http://laravel.com/docs/master/providers
 */
class ServiceProvider extends BaseServiceProvider
{
    public function register()
    {
        $this->app->singleton('laravolt.etalase', function(){
            return new Etalase();
        });
    }

    public function boot()
    {
        $this->loadViewsFrom(realpath(__DIR__.'/../resources/views'), 'etalase');
        $this->loadRoutes();
        $this->registerMenu();
        $this->registerBlade();
        $this->registerVariables();

        //auth()->login(User::first());
    }

    protected function loadRoutes()
    {
        /**
         * @var \Illuminate\Routing\Router $router
         */
        $router = $this->app['router'];

        $router->group(['prefix' => 'etalase', 'middleware' => ['web']], function () use ($router) {

            $router->get('search/{query?}', function($query){

                $data = \Indonesia::search($query)->paginateVillages();

                $results = [];
                foreach($data as $village) {
                    $data->load('district.city.province');
                    $results[] = [
                        'name'  => "<strong>$village->name</strong>, $village->district_name, $village->city_name, $village->province_name",
                        'description'  => "$village->name, $village->district_name, $village->city_name, $village->province_name",
                        'value'  => $village->id,
                    ];
                }

                $json = ['success' => true, 'results' => $results];
                return response()->json($json);
            });

            $router->get('{page}', function ($page) {
                try {
                    return view('etalase::example.'.$page);
                } catch (\Exception $e) {
                    return view('etalase::missing', compact('page'));
                }
            })->where('page', '.*');

        });
    }

    protected function registerMenu()
    {
        if ($this->app->bound('laravolt.menu')) {

        }
    }

    protected function registerBlade()
    {

        Blade::directive('etalase', function($expression) {
            return "<?php echo app('laravolt.etalase')->start($expression); ?>";
        });

        Blade::directive('endetalase', function($expression) {
            return "<?php echo app('laravolt.etalase')->stop(); ?>";
        });
    }

    protected function registerVariables()
    {
        View::composer('etalase::*', function($view){
            $faker = Factory::create();
            $view->with('faker', $faker);
        });
    }
}
