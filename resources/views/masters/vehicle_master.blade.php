@extends('layout.app')
@section('content')

<h2>ADD Vehicle</h2>

<div class="card p-4">
    <form action="{{ route('vehicle.store') }}" method="POST">
        @csrf

        <div class="row">

            {{-- Company Name --}}
            <div class="form-group col-md-3">
                <label for="company_id">Company Name</label>
                <select class="form-select" name="company_id" id="company_id" required>
                    <option value="">Select Company</option>
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Owner Name --}}
            <div class="form-group col-md-3">
                <label for="owner_id">Owner Name</label>
                <select class="form-select" name="owner_id" id="owner_id" required>
                    <option value="">Select Owner</option>
                    @foreach($owners as $owner)
                        <option value="{{ $owner->id }}">{{ $owner->owner_name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- vehicle number --}}
            <div class="form-group col-md-3 ">
                <label for="vehicle_number">Vehicle Number</label>
                <input type="text" class="form-control" name="vehicle_number" id="vehicle_number" autocomplete="off" required>
            </div>

            {{-- Make --}}
            <div class="form-group col-md-3 ">
                <label for="renewal_end">Make</label>
                <input type="text" class="form-control" name="make" id="make"  autocomplete="off" required>
            </div>

            {{-- FC Exp Date --}}
            <div class="form-group col-md-3">
                <label for="fc_exp">FC Exp Date</label>
                <input type="date" class="form-control" name="fc_exp" id="fc_exp" autocomplete="off" required>
            </div>

            {{-- RC End Date --}}
            <div class="form-group col-md-3 mt-3">
                <label for="rc_end">RC End Date</label>
                <input type="date" class="form-control" name="rc_end" id="rc_end" autocomplete="off" required>
            </div>

            {{-- Chassis Number --}}
            <div class="form-group col-md-3 mt-3">
                <label for="chassis_no">Chassis No</label>
                <input type="text" class="form-control" name="chassis_no" id="chassis_no" autocomplete="off"  required>
            </div>

            {{-- Engine Number --}}
            <div class="form-group col-md-3 mt-3">
                <label for="engine_no">Engine No</label>
                <input type="text" class="form-control" name="engine_no" id="engine_no" autocomplete="off" required>
            </div>

        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Save Vehicle</button>
        </div>

    </form>
</div>

@endsection
