@extends('app')

@section('content')

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="p-4 card" style="width: 400px;">
            <h1 class="mb-4 text-center">Enter Details</h1> <!-- Heading added -->

            <form action="{{ route('client.store') }}" method="POST">
                @csrf
                <!-- Name input -->
                <div data-mdb-input-init class="mb-4 form-outline">
                    <input type="text" id="name" name="name" class="form-control" />
                    <label class="form-label" for="name">Enter Your Name</label>
                </div>
                
                <!-- Surname input -->
                <div data-mdb-input-init class="mb-4 form-outline">
                    <input type="text" id="sur_name" name="sur_name" class="form-control" />
                    <label class="form-label" for="sur_name">Enter Surname</label>
                </div>
                
                <!-- Submit button -->
                <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block">Go To Conference List</button>
            </form>
        </div>
    </div>
@endsection
