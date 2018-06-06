<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //added to resolve "PDOException::("SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error
        // in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax
        // to use near ') default character set utf8 collate 'utf8_unicode_ci'' at line 1")"
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
