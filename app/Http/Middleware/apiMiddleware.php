<?php

namespace App\Http\Middleware;

use App\Models\itemMasterModel;
use Closure;
use DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class apiMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $table_name = "purchase_code_verifier";
        $table_column = "item_id";
        $purchase_code = $request->purchase_code;

        // $exists = DB::table($table_name)->where($table_column, $request->envato_res['item']['id'])->exists();
        // dd(vars: $exists);
        
        $master_table =itemMasterModel::where('item_id', $request->envato_res['item']['id'])->exists();
        dd($master_table);

        
        if ($master_table == false ) {
            return response()->json(['status' => 400, 'message' => "Item id not found in Master Table Fail..☹️"]);
        } else {
             return $next($request);
            
        }
        
        
    }
}
