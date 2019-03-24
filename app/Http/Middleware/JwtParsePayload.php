<?php

namespace App\Http\Middleware;

use App\Utils\Jwt;
use Closure;

class JwtParsePayload
{
    use Jwt;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $payload = $this->parsePayload('business');
        $request->merge(['merchantId' => $payload['sub']]);
        return $next($request);
    }
}
