@extends('layout.app')
@section('content')

<h2>Vehicle List</h2>

{{-- Filter Form --}}
<div class="card p-3 mb-4">
    <form method="GET" action="{{ route('vehicle.filter') }}">
        <div class="row">

            <div class="form-group col-md-3">
                <label for="company_id">Company</label>
                <select class="form-select" name="company_id" id="company_id">
                    <option value="">All Companies</option>
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}">
                            {{ $company->company_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-3">
                <label for="owner_id">Owner</label>
                <select class="form-select" name="owner_id" id="owner_id">
                    <option value="">All Owners</option>
                    @foreach($owners as $owner)
                        <option value="{{ $owner->id }}">
                            {{ $owner->owner_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-3 d-flex align-items-end">
                <button class="btn btn-success">Filter</button>
            </div>

        </div>
    </form>
</div>

{{-- Vehicle Table --}}
<div class="card p-3">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>SI.NO</th>
                <th>Company</th>
                <th>Owner</th>
                <th>Vehicle Number</th>
                <th>Make</th>
                <th>FC Exp Date</th>
                <th>RC End Date</th>
                <th>Chassis No</th>
                <th>Engine No</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($vehicles as $index => $vehicle)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $vehicle->company->company_name }}</td>
                    <td>{{ $vehicle->owner->owner_name }}</td>
                    <td>{{ $vehicle->vehicle_number}}</td>
                    <td>{{ $vehicle->make }}</td>
                    <td>{{ $vehicle->fc_exp }}</td>
                    <td>{{ $vehicle->rc_end }}</td>
                    <td>{{ $vehicle->chassis_number }}</td>
                    <td>{{ $vehicle->engine_number }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">No vehicles found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
