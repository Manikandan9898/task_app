<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use App\Models\Vehicle;
 use App\Models\Company;
 use App\Models\Owner;
class VehicleController extends Controller
{
   

public function vehicle_index(Request $request)
{
    $companies = Company::all();
    $owners = Owner::all();

    $vehicles = Vehicle::query();

    if ($request->filled('company_id')) {
        $vehicles->where('company_id', $request->company_id);
    }

    if ($request->filled('owner_id')) {
        $vehicles->where('owner_id', $request->owner_id);
    }

    $vehicles = $vehicles->with(['company', 'owner'])->get();

    if ($request->ajax()) {
        return response()->json([
            'vehicles' => $vehicles,
        ]);
    }

    return view('pages.vehicle', compact('vehicles', 'companies', 'owners'));
}


}
