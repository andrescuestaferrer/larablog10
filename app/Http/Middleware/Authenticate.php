<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo(Request $request): ?string
    {
        // return $request->expectsJson() ? null : route('login');
        if (! $request->expectsJson()) {
            if($request->routeIs('author.*')){
                session()->flash('fail', __('You must sign in first, dude!!') );
                return route('author.login', ['fail' => true, 'returnUrl' => URL::current()] );
            }
        }
    }


}
