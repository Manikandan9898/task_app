@extends('layout.app')
@section('content')

<h2>Company</h2>

<div class="master-form">
    <div class="card p-3">

        {{-- Success Message --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form --}}
        <form action="{{ route('company.store') }}" method="POST">
            @csrf
            <div class="form-group col-6">
                <label for="company_name">Company Name</label>
                <input type="text" class="form-control" name="company_name" id="company_name" autocomplete="off" required>
            </div>
            <div class="footer mt-2">
                <button class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>
</div>

{{-- Table to display companies --}}
<div class="mt-4">
    <div class="card p-3">
        <h5>Company List</h5>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Company Name</th>
                </tr>
            </thead>
            <tbody>
                @forelse($companies as $index => $company)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $company->company_name }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">No companies found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
