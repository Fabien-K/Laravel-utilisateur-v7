<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;

class IsNotBanned
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      if(null != Auth::user())
      {
          if(Auth::user()->isNotBanned())
          {
            return $next($request);

          } else if (null !== $request['email'])
          {
              $user = User::withTrashed()->firstWhere('email', $request['email']);
              if (null === $user || $user->isNotBanned())
              {
                return $next($request);
              }
          }
          $banMessage = "Tu es bannis du site.";
          Auth::logout();
          return redirect()->route('login')->withMessage($banMessage);          
      }
    }
}
