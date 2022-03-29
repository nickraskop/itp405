<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Configuration;

class MaintenanceMode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $requestedRouteName = $request->route()->getName();
        $isMaintenanceMode = Configuration::where('name', '=', 'maintenance-mode')->first()->value;
        if ($isMaintenanceMode && $requestedRouteName != 'maintenance.index') {
            return redirect()->route('maintenance.index');
        }
        if (!$isMaintenanceMode && $requestedRouteName == 'maintenance.index') {
            return redirect()->route('home.index');
        }
        return $next($request);
    }
}
