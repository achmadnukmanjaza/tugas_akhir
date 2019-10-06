<?php 

namespace App\Http\Middleware;

use Closure;
use Session;

class cek_logen{
  public function handle($request, Closure $next)
  {
      if(Session::get('logen_status')!=true){
          return redirect('logen');
      }
      return $next($request);
  }  
}