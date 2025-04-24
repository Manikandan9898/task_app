<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Owner;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    //

    public function owners(Request $request)
    {
        $owners = Owner::all();
        return view('masters.owner_master',compact('owners'));
    }

    public function store(Request $request)
    {
         $request->validate([
            'owner_name' => 'required|string|max:255|unique:owners_master,owner_name',
        ]);

        $owner = new Owner();
        $owner->owner_name = $request->owner_name;
        $owner->save();

       
        return redirect()->back()->with('success', 'Owner added successfully!');
    }

    public function company(Request $request)
    {
        $companies= Company::all();
        return view('masters.company_masters',compact('companies'));
    }

    public function company_store(Request $request)
    {
         $request->validate([
            'company_name' => 'required|string|max:255|unique:company_masters,company_name',
        ]);

        $company = new Company();
        $company->company_name = $request->company_name;
        $company->save();

       
        return redirect()->back()->with('success', 'Owner added successfully!');
    }

    public function vehicle (Request $request)
    {
        $companies = Company::all();
        $owners = Owner::all();

        return view('masters.vehicle_master', compact('companies', 'owners'));
    }

    public function vehicle_store(Request $request)
    {
        $request->validate([
            'company_id' => 'required|exists:company_masters,id',
            'owner_id' => 'required|exists:owners_master,id',
            'make' => 'nullable|string|max:255',
            'fc_exp' => 'required|date',
            'rc_end' => 'required|date',
            'chassis_no' => 'required|string|max:255|unique:vehicles,chassis_number',
            'engine_no' => 'required|string|max:255|unique:vehicles,engine_number',
            'vehicle_number' => 'required|string|max:255|unique:vehicles,vehicle_number',
        ]);
        

        $vehicle = new Vehicle();
        $vehicle->company_id = $request->company_id;
        $vehicle->owner_id = $request->owner_id;
        $vehicle->make = $request->make;
        $vehicle->fc_exp = $request->fc_exp;
        $vehicle->rc_end = $request->rc_end;
        $vehicle->chassis_number = $request->chassis_no;
        $vehicle->engine_number = $request->engine_no;
        $vehicle->vehicle_number = $request->vehicle_number;
        $vehicle->save();

        return redirect()->route('vehicle.filter')->with('success', 'Vehicle saved successfully!');
    }

}
