<?php

namespace Kiwi\UserManager;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Routing\Router;
use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Kiwi\UserManager\Exceptions\UserManagerException;
use App;
use Validator;
use Config;

class UserManagerServiceProvider extends ServiceProvider
{

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(Kernel $kernel, DispatcherContract $events, Router $router)
    {

        $this->mergeConfigFrom(__DIR__.'/config/usermanager.php', 'kiwi.usermanager');
        $this->loadViewsFrom(__DIR__.'/resources/views', 'kiwi/usermanager');
        $this->loadTranslationsFrom(__DIR__.'/resources/lang', 'kiwi/usermanager');

        $this->publishes([
          __DIR__.'/resources/views' => base_path('resources/views/vendor/kiwi/usermanager'),
          __DIR__.'/resources/lang' => base_path('resources/lang/vendor/kiwi/usermanager'),
          __DIR__.'/config/usermanager.php' => config_path('kiwi/usermanager.php'),
        ]);


        // Set e-mail reset view
        Config::set('auth.password.email', 'kiwi/usermanager::emails.'. $this->app->getLocale() .'.reset');

        // Add package routes
        $this->app->router->group(['namespace' => 'Kiwi\UserManager\Http\Controllers'],
        function(){
            require __DIR__.'/Http/routes.php';
        });

        /**
        *   Register events
        */
        $registeredEvents = Config::get('kiwi.usermanager.events');

        foreach($registeredEvents as $event => $listeners){
            if(is_array($listeners)){
                foreach($listeners as $listener){
                    $events->listen($event, $listener);
                }
            }
            elseif(is_string($listeners)){
                $events->listen($event, $listeners);
            }
            else {
                throw new UserManagerException('Invalid listeners for ' . $event . ' event (string or array required, '. gettype($listeners) .' provided)');
            }
        }

        /*
        *   Add password validator
        *   Checks if $value matches current user's password
        */
        Validator::extend('password', 'Kiwi\UserManager\Validators\Password@validate', trans('kiwi/usermanager::validation.password'));

        /*
        *   Init services
        */

        $kernel->pushMiddleware('Kiwi\UserManager\Http\Middleware\UserManager');


        /*
        * NoCaptcha config
        */
        $noCaptcha = Config::get('kiwi.usermanager.services.nocaptcha');

        if(!is_null($noCaptcha) && $noCaptcha){

          $noCaptchaSecretKey = env('NOCAPTCHA_SECRET');
          $noCaptchaSiteKey = env('NOCAPTCHA_SITEKEY');

          if((strlen($noCaptchaSecretKey) == 0) || (strlen($noCaptchaSiteKey) == 0)){
              throw new UserManagerException('In order to use NoCaptcha ReCaptcha service, please set your secret keys in your config file (NOCAPTCHA_SITEKEY, NOCAPTCHA_SECRET)');
          }
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
         $this->app->singleton('UserManager', function($app){
            return new UserManager();
         });

        $this->app->register('Collective\Html\HtmlServiceProvider');
        $loader = AliasLoader::getInstance();
        $loader->alias('Form', 'Collective\Html\FormFacade');
        $loader->alias('Html', 'Collective\Html\HtmlFacade');

        $this->app->register('Anhskohbo\NoCaptcha\NoCaptchaServiceProvider');
    }

}
