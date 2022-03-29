<?php

namespace App\Http\Controllers;
use App\Models\Configuration;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaintenanceController extends Controller
{
    public function index()
    {
      return view('maintenance.index');
    }

    public function secret()
    {
      $maintenance = Configuration::where('name', '=', 'maintenance-mode')->first();

      return view('maintenance.edit', [
        'maintenance' => $maintenance,
        'val' => $maintenance->value,
      ]);
    }

    public function update(Request $request)
    {
      $val = false;
      if ($request->input('value') == 'on') {
        $val = true;
      }
      $config = Configuration::where('name', '=', 'maintenance-mode')->first();
      $config->value = $val;
      $config->save();

      return redirect()
        ->route('maintenance.edit');
    }

    public function test()
    {
      return view('maintenance.test');
    }
}