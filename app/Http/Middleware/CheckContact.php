<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckContact
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,$my_model)
    {
        $model = app($my_model);

        $validator = app('validator')->make($request->input(), $model->rules($request));

        if ($validator->fails()) {

            return $this->response($request, $validator->errors());
        }

        return $next($request);

    }
    protected function response($request, $errors)
    {
        if($request->ajax()) {
            return new JsonResponse($errors, 422);
        }

        return redirect()->back()->withErrors($errors)->withInput();
    }
}
