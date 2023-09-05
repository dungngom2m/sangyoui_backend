<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Controller;
use Closure;
use Exception;
use PHPOpenSourceSaver\JWTAuth\Exceptions\TokenBlacklistedException;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class AssignGuard
{
    public function handle($request, Closure $next, $guard = null)
    {
        if ($guard != null) {
            auth()->shouldUse($guard);
            if (!auth()->guard($guard)->check()) {
                if ($guard == 'clientUser') {
                    $guardText = 'クライアントユーザ';
                } elseif ($guard == 'sangyoi') {
                    $guardText = '産業医';
                } else {
                    $guardText = 'ユーザ';
                }
                return (new Controller())->response(500, [], __('text.guard_error', ['guard' => $guardText]));
            }
        }
        return $next($request);
    }
}
