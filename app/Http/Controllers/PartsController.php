<?php

namespace App\Http\Controllers;

use App\Models\parts;
use App\Models\brands;
use App\Models\winnings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PartsController extends Controller
{
    public function index()
    {
        $parts = response()->json(parts::all());
        return $parts;
    }

    public function show($id)
    {
        $parts = response()->json(parts::find($id));
        return $parts;
    }

    public function store(Request $request)
    {
        $parts = new parts();
        $parts->name = $request->name;
        $parts->save();
    }

    public function update(Request $request, $id)
    {
        $parts = parts::find($id);
        $parts->name = $request->name;
        $parts->save();
    }

    public function destroy($id)
    {
        parts::find($id)->delete();
    }
    public function brandWinnings($brand_id)
    {
        return brands::with('winn_types')->where('brand_id', '=', $brand_id)->get();
    }
    public function userWinningsWithMultipleProducts()
    {
        $userId = Auth::user()->id;
        $winnings = DB::table('winnings')
            ->join('brands', 'winnings.brand_id', '=', 'brands.brand_id')
            ->join('users', 'winnings.user_id', '=', 'users.id')
            ->select('winnings.brand_id', 'brands.*')
            ->where('winnings.user_id', $userId)
            ->groupBy('winnings.brand_id')
            ->havingRaw('COUNT(DISTINCT winnings.product_id) > 1')
            ->get();
        return response()->json($winnings);
    }
    public function deleteWinning()
    {
        $userId = Auth::user()->id;
        $deletedCount = DB::table('winnings')
            ->where('user_id', '=', $userId)
            ->whereDate('created_at', '=', date('Y-m-d'))
            ->delete();
    
        return response()->json($deletedCount);
    }
}
