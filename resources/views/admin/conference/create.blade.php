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
        <h2 class="mb-4 text-center" style="color: #4a90e2;">Create Conference</h2>

        <form class="p-4 shadow-lg" style="background-color: #fff; border-radius: 8px;"
            action="{{ route('conference.store') }}" method="POST">
            @csrf
            <!-- Conference Name input -->
            <div class="mb-4 form-outline">
                <input type="text" id="name" class="form-control" placeholder="Enter name" name="name" required />
                <label class="form-label" for="ConferenceName">Conference Name</label>
            </div>

            <!-- Conference Description input -->
            <div class="mb-4 form-outline">
                <textarea class="form-control" id="description" name="description" rows="4"
                    placeholder="Enter Conference description" required></textarea>
                <label class="form-label" for="ConferenceDescription">Conference Description</label>
            </div>

            <!-- Lecturers input -->
            <div class="mb-4 form-outline">
                <input type="text" id="lecturers" name="lecturers" class="form-control"
                    placeholder="Enter lecturers (comma separated)" required />
                <label class="form-label" for="lecturers">Lecturers</label>
            </div>

            <!-- Date input -->
            <div class="mb-4 form-outline">
                <input type="date" id="date" name="date" class="form-control" required />
                <label class="form-label" for="ConferenceDate">Date</label>
            </div>

            <!-- Time input -->
            <div class="mb-4 form-outline">
                <input type="time" id="time" name="time" class="form-control" required />
                <label class="form-label" for="ConferenceTime">Time</label>
            </div>

            <!-- Address input -->
            <div class="mb-4 form-outline">
                <input type="text" id="address" name="address" class="form-control" placeholder="Enter address"
                    required />
                <label class="form-label" for="ConferenceAddress">Address</label>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block w-100" style="background-color: #4a90e2;">Create
                Conference</button>
        </form>
    </div>
@endsection
