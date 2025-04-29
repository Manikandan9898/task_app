@extends('layout.app')

@section('content')

<h2>Vehicle List</h2>

{{-- Filter Form --}}
<div class="card p-3 mb-4">
    <form id="filter-form">
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
                <button type="submit" class="btn btn-success">Filter</button>
            </div>
        </div>
    </form>
</div>

{{-- Column Selector --}}
<div class="mb-2">
    <label for="column-selector">Select Field to Display:</label>
    <select id="column-selector" class="form-select" multiple>
        <option value="company">Company</option>
        <option value="owner">Owner</option>
        <option value="vehicle_number">Vehicle Number</option>
        <option value="make">Make</option>
        <option value="fc_exp">FC Exp Date</option>
        <option value="rc_end">RC End Date</option>
        <option value="chassis_number">Chassis No</option>
        <option value="engine_number">Engine No</option>
    </select>
</div>

{{-- Vehicle Table --}}
<div class="card p-3">
    <table class="table table-bordered" id="vehicle-table">
        <thead>
            <tr>
                <th>SI.NO</th>
                <th class="col-company d-none">Company</th>
                <th class="col-owner d-none">Owner</th>
                <th class="col-vehicle_number d-none">Vehicle Number</th>
                <th class="col-make d-none">Make</th>
                <th class="col-fc_exp d-none">FC Exp Date</th>
                <th class="col-rc_end d-none">RC End Date</th>
                <th class="col-chassis_number d-none">Chassis No</th>
                <th class="col-engine_number d-none">Engine No</th>
            </tr>
        </thead>
        <tbody id="vehicle-table-body">
            <!-- Vehicle rows will be populated here by AJAX -->
        </tbody>
    </table>
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        function reinitializeSelect2() {
            $('#company_id').select2({ width: '100%' });
            $('#owner_id').select2({ width: '100%' });
            $('#column-selector').select2({ width: '100%', placeholder: "Select Fields to display" });
        }

        reinitializeSelect2();

        function updateColumns() {
            const selected = $('#column-selector').val() || [];
            const allColumns = [
                'company', 'owner', 'vehicle_number', 'make',
                'fc_exp', 'rc_end', 'chassis_number', 'engine_number'
            ];

            allColumns.forEach(key => {
                const colClass = `.col-${key}`;
                if (selected.includes(key)) {
                    $(colClass).removeClass('d-none');
                } else {
                    $(colClass).addClass('d-none');
                }
            });
        }

        
        $('#column-selector').on('change', function() {
            updateColumns();
            filterVehicles(); 
        });

        function filterVehicles() {
            const formData = $('#filter-form').serialize(); 
            const selectedColumns = $('#column-selector').val() || [];

            $.ajax({
                url: "{{ route('vehicle.filter') }}",
                method: 'GET',
                data: formData,
                success: function(response) {
                   
                    $('#vehicle-table-body').empty();

                    
                    if (response.vehicles.length > 0) {
                        response.vehicles.forEach((vehicle, index) => {
                            let row = `<tr>
                                <td>${index + 1}</td>
                                <td class="col-company d-none">${vehicle.company.company_name}</td>
                                <td class="col-owner d-none">${vehicle.owner.owner_name}</td>
                                <td class="col-vehicle_number d-none">${vehicle.vehicle_number}</td>
                                <td class="col-make d-none">${vehicle.make}</td>
                                <td class="col-fc_exp d-none">${vehicle.fc_exp}</td>
                                <td class="col-rc_end d-none">${vehicle.rc_end}</td>
                                <td class="col-chassis_number d-none">${vehicle.chassis_number}</td>
                                <td class="col-engine_number d-none">${vehicle.engine_number}</td>
                            </tr>`;
                            $('#vehicle-table-body').append(row);
                        });
                    } else {
                        $('#vehicle-table-body').append('<tr><td colspan="9" class="text-center">No vehicles found.</td></tr>');
                    }

                   
                    updateColumns();
                }
            });
        }

        filterVehicles();

       
        $('#filter-form').on('submit', function(e) {
            e.preventDefault();
            filterVehicles();
        });
    });
</script>
@endsection
