<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            if ($request->routeIs('admin.*')) {
                return route('admin.login');
            }
            if ($request->routeIs('doctor.*')) {
                return route('doctor.login');
            }
            if ($request->routeIs('patient.*')) {
                return route('patient.login');
            }
            if ($request->routeIs('hospital.*')) {
                return route('hospital.login');
            }
            if ($request->routeIs('dawakhana.*')) {
                return route('dawakhana.login');
            }
            if ($request->routeIs('lab.*')) {
                return route('lab.login');
            }

            if ($request->routeIs('frontdoctor.*')) {
                return route('frontdoctor.login');
            }

            if ($request->routeIs('fronthakeem.*')) {
                return route('fronthakeem.login');
            }

            if ($request->routeIs('frontpatient.*')) {
                return route('frontpatient.login');
            }

            if ($request->routeIs('frontlabority.*')) {
                return route('frontlabority.login');
            }

            if ($request->routeIs('frontpharmacy.*')) {
                return route('frontpharmacy.login');
            }

            return route('user.login');
        }
    }
}
