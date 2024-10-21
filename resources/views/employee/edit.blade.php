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
        <h2 class="mb-4 text-center" style="color: #4a90e2;">Edit Conference</h2>
        <form class="p-4 shadow-lg" style="background-color: #fff; border-radius: 8px;"
            action="{{ route('conference.update', $conference->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Course Name input -->
            <div class="mb-4 form-outline">
                <input type="text" name="name" id="courseName" class="form-control" placeholder="Enter course name"
                    value="{{ old('name', $conference->name) }}" required />
                <label class="form-label" for="courseName">Course Name</label>
            </div>

            <!-- Course Description input -->
            <div class="mb-4 form-outline">
                <textarea name="description" class="form-control" id="courseDescription" rows="4"
                    placeholder="Enter course description">{{ old('description', $conference->description) }}</textarea>
                <label class="form-label" for="courseDescription">Course Description</label>
            </div>

            <!-- Lecturers input -->
            <div class="mb-4 form-outline">
                <input type="text" name="lecturers" id="lecturers" class="form-control"
                    placeholder="Enter lecturers (comma separated)"
                    value="{{ old('lecturers', implode(',', json_decode($conference->lecturers, true))) }}" />
                <label class="form-label" for="lecturers">Lecturers</label>
            </div>

            <!-- Date input -->
            <div class="mb-4 form-outline">
                <input type="date" name="date" id="courseDate" class="form-control"
                    value="{{ old('date', $conference->date) }}" required />
                <label class="form-label" for="courseDate">Date</label>
            </div>

            <!-- Time input -->

            <!-- Time input -->
            <div class="mb-4 form-outline">
                <input type="time" name="time" id="courseTime" class="form-control"
                    value="{{ old('time', $conference->time) }}" required />
                <label class="form-label" for="courseTime">Time</label>
            </div>


            <!-- Address input -->
            <div class="mb-4 form-outline">
                <input type="text" name="address" id="address" class="form-control" placeholder="Enter address"
                    value="{{ old('address', $conference->address) }}" required />
                <label class="form-label" for="address">Address</label>
            </div>

            <button type="submit" class="btn btn-primary">Update Conference</button>
        </form>
    </div>
@endsection
