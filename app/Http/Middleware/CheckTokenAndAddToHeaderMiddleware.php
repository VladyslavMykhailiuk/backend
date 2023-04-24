<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class CheckTokenAndAddToHeaderMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $all = $request->all();
        if (isset($all['_sp_token'])) {
            $request->headers->add([
                'Authorization' =>  sprintf('%s %s', 'Bearer', $all['_sp_token']),
                'Content-Type' => 'application/json',
                'Accept' => 'application/json, text/plain, */*',
                'X-XSRF-TOKEN' => $all['xsrf'],
                'Cache-Control' => 'no-cache'
            ]);
        }
        return $next($request);
    }
}
