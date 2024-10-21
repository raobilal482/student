@extends('app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
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
    <div class="container mt-5">
        <h2 class="mb-4 text-center" style="color: #4a90e2;">Edit User</h2>
        <form class="p-4 shadow-lg" style="background-color: #fff; border-radius: 8px;"
            action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Course Name input -->
            <div class="mb-4 form-outline">
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter user name"
                    value="{{ old('name', $user->name) }}" required />
                <label class="form-label" for="name">Enter Name</label>
            </div>

            <div class="mb-4 form-outline">
                <input type="text" name="sur_name" id="sur_name" class="form-control" placeholder="Enter user sur name"
                    value="{{ old('name', $user->sur_name) }}" required />
                <label class="form-label" for="name">Enter Sur Name</label>
            </div>

            <button type="submit" class="btn btn-primary">Update User Info</button>
        </form>
    </div>
@endsection
