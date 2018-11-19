<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AssetsImages;

class AssetsImageController extends Controller
{
  public function index( Request $request)
  {
    return response()->view('welcome', [
      'request' => $request
    ]);
  }

  public function assets( AssetsImages $assets )
  {
    $assets = new $assets;
    $query = $assets->orderBy('id', 'desc')->get();
    return response()->json([
      'data' => $query
    ]);
  }
}
