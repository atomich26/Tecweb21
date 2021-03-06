<?php

namespace App\Providers;

use App\User;
use App\Observers\UserObserver;
use App\Models\Resources\Prodotto;
use App\Observers\ProdottoObserver;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;
use App\Models\Resources\CentroAssistenza;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Aggiunge gli observer alle classi User e Prodotto
        User::observe(UserObserver::class);
        Prodotto::observe(ProdottoObserver::class);

        // Imposta come lunghezza di default delle stringhe nelle migration
        Schema::defaultStringLength(Config::get('strings.global.default'));

        //Crea una macro per gestire i redirect con i messaggi all'utente.
        Response::macro('actionResponse', function($routeName, $routeParams = null, $alert, $message){
            return redirect()->route($routeName, $routeParams)->with('alert', $alert)
                ->with('message', $message);
        });
    }
}
