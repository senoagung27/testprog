<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Keranjang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

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
        // $user = Auth::user();
        // dd($user);
        // $dataKeranjangUser = Keranjang::where('user_id',1)->get();
        // dd($dataKeranjangUser);
        // View::share('keranjang', $dataKeranjangUser);
        view()->composer('*', function ($view) 
        {
            // $dataKeranjangUser = Keranjang::where('user_id', Auth::user()->id)->get();
            // dd(Auth::user()->id);
            //...with this variable
            // $view->with('keranjang', $dataKeranjangUser );    
        });  
    }
}
