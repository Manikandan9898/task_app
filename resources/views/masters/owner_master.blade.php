@extends('layout.app')
@section('content')

<h2>Owner</h2>

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
        <form action="{{ route('owner.store') }}" method="POST">
            @csrf
            <div class="form-group col-6">
                <label for="owner_name">Owner Name</label>
                <input type="text" class="form-control" name="owner_name" id="owner_name" autocomplete="off" required>
            </div>
            <div class="footer mt-2">
                <button class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>
</div>

{{-- Table to display owners --}}
<div class="mt-4">
    <div class="card p-3">
        <h5>Owner List</h5>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Owner Name</th>
                </tr>
            </thead>
            <tbody>
                @forelse($owners as $index => $owner)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $owner->owner_name }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">No owners found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
