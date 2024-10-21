@extends('app')
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container mt-5">
        <h2 class="mb-4 text-center" style="color: #4a90e2;">Create User</h2>

        <form class="p-4 shadow-lg" style="background-color: #fff; border-radius: 8px;"
            action="{{ route('admin.user.store') }}" method="POST">
            @csrf
            <div class="mb-4 form-outline">
                <input type="text" id="name" class="form-control" placeholder="Enter Email" name="email"
                    required />
                <label class="form-label">Enter Email</label>
            </div>
            <!-- Course Name input -->
            <div class="mb-4 form-outline">
                <input type="text" id="name" class="form-control" placeholder="Enter name" name="name"
                    required />
                <label class="form-label">Enter Name</label>
            </div>
            <div class="mb-4 form-outline">
                <input type="text" id="sur_name" class="form-control" placeholder="Enter Sur Name" name="sur_name"
                    required />
                <label class="form-label">Enter Sur Name</label>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block w-100" style="background-color: #4a90e2;">Create
                User</button>
        </form>
    </div>


@endsection
