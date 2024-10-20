@extends('welcome')  <!-- Make sure this points to your main layout file -->
@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4" style="color: #4a90e2;">Create User</h2>

    <form class="p-4 shadow-lg" style="background-color: #fff; border-radius: 8px;" action="{{ route('admin.user.store') }}" method="POST">
        @csrf
      <!-- Course Name input -->
      <div class="form-outline mb-4">
        <input type="text" id="name" class="form-control" placeholder="Enter name" name="name" required/>
        <label class="form-label" >Enter Name</label>
      </div>
      <div class="form-outline mb-4">
        <input type="text" id="sur_name" class="form-control" placeholder="Enter Sur Name" name="sur_name" required/>
        <label class="form-label" >Enter Sur Name</label>
      </div>

      <!-- Submit button -->
      <button type="submit" class="btn btn-primary btn-block w-100" style="background-color: #4a90e2;">Create User</button>
    </form>
  </div>


@endsection
