<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mobil;
use Illuminate\Http\Request;

class MobilApiController extends Controller
{
    public function index()
    {
        $datas = Mobil::all();

        return response()->json([
            'success' => true,
            'data_mobil' => $datas
        ], 200);
    }
}
