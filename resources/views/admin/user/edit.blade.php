@extends('welcome')

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
    <h2 class="text-center mb-4" style="color: #4a90e2;">Edit User</h2>
    <form class="p-4 shadow-lg" style="background-color: #fff; border-radius: 8px;" action="{{ route('admin.user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Course Name input -->
        <div class="form-outline mb-4">
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter user name" value="{{ old('name', $user->name) }}" required />
            <label class="form-label" for="name">Enter Name</label>
        </div>

        <div class="form-outline mb-4">
            <input type="text" name="sur_name" id="sur_name" class="form-control" placeholder="Enter user sur name" value="{{ old('name', $user->sur_name) }}" required />
            <label class="form-label" for="name">Enter Sur Name</label>
        </div>

        <button type="submit" class="btn btn-primary">Update User Info</button>
    </form>
</div>
@endsection
