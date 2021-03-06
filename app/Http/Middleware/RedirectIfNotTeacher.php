<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use  App\Subject;
use App;

class RedirectIfNotTeacher
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @param  string|null  $guard
	 * @return mixed
	 */
	public function handle($request, Closure $next, $guard = 'teacher')
	{
	    if (!Auth::guard($guard)->check()) {
			
			$subjects = App\Subject::all();
		
	        return redirect('teacher/login')->with('subjects', $subjects);
	    }

	    return $next($request);
	}
}