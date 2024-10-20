@extends('welcome')  <!-- Make sure this points to your main layout file -->
@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4" style="color: #4a90e2;">Create Conference</h2>

    <form class="p-4 shadow-lg" style="background-color: #fff; border-radius: 8px;" action="{{ route('conference.store') }}" method="POST">
        @csrf
      <!-- Course Name input -->
      <div class="form-outline mb-4">
        <input type="text" id="name" class="form-control" placeholder="Enter name" name="name" required/>
        <label class="form-label" for="courseName">Course Name</label>
      </div>

      <!-- Course Description input -->
      <div class="form-outline mb-4">
        <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter course description" required></textarea>
        <label class="form-label" for="courseDescription">Course Description</label>
      </div>

      <!-- Lecturers input -->
      <div class="form-outline mb-4">
        <input type="text" id="lecturers" name="lecturers" class="form-control" placeholder="Enter lecturers (comma separated)" required/>
        <label class="form-label" for="lecturers">Lecturers</label>
      </div>

      <!-- Date input -->
      <div class="form-outline mb-4">
        <input type="date" id="date" name="date" class="form-control" required/>
        <label class="form-label" for="courseDate">Date</label>
      </div>

      <!-- Time input -->
      <div class="form-outline mb-4">
        <input type="time" id="time" name="time" class="form-control" required/>
        <label class="form-label" for="courseTime">Time</label>
      </div>

      <!-- Address input -->
      <div class="form-outline mb-4">
        <input type="text" id="address" name="address" class="form-control" placeholder="Enter address" required />
        <label class="form-label" for="courseAddress">Address</label>
      </div>

      <!-- Submit button -->
      <button type="submit" class="btn btn-primary btn-block w-100" style="background-color: #4a90e2;">Create Conference</button>
    </form>
  </div>


@endsection
