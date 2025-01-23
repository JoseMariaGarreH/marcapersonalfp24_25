<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReactAdminResponse
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        $request->merge(['perPage' => 10]);
        if ($request->filled('_start')) {
            if ($request->filled('_end')) {
                $request->merge(['perPage' => 1 + $request->_end - $request->_start]);
            }
            $request->merge(['page' => intval($request->_start / $request->perPage) + 1]);
        }

        $response = $next($request);
        if ($request->routeIs('*.index')) {
            abort_unless(property_exists($request->route()->controller, 'modelclass'), 500, "It must exist a modelclass property in the controller.");
            $modelClassName = $request->route()->controller->modelclass;

            $query = $modelClassName::query();

            $filterValue = $request->q;
            $filterColumns = (new $modelClassName)->getFillable();

            if ($filterValue) {
                $query->where(function ($query) use ($filterValue, $filterColumns) {
                    foreach ($filterColumns as $column) {
                        $query->orWhere($column, 'like', '%' . $filterValue . '%');
                    }
                });
            }

            $query->orderBy($request->_sort ?? 'id', $request->_order ?? 'asc');

            $results = $query->paginate($request->perPage);

            $response->header('X-Total-Count', $results->total());

            // Set the response data
            $response->setData($results->items());
        }

        return $response;
    }
}
