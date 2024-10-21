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
        <h2 class="mb-4 text-center" style="color: #4a90e2;">Edit Conference</h2>
        <form class="p-4 shadow-lg" style="background-color: #fff; border-radius: 8px;"
            action="{{ route('conference.update', $conference->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Conference Name input -->
            <div class="mb-4 form-outline">
                <input type="text" name="name" id="ConferenceName" class="form-control"
                    placeholder="Enter Conference name" value="{{ old('name', $conference->name) }}" required />
                <label class="form-label" for="ConferenceName">Conference Name</label>
            </div>

            <!-- Conference Description input -->
            <div class="mb-4 form-outline">
                <textarea name="description" class="form-control" id="ConferenceDescription" rows="4"
                    placeholder="Enter Conference description">{{ old('description', $conference->description) }}</textarea>
                <label class="form-label" for="ConferenceDescription">Conference Description</label>
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
                <input type="date" name="date" id="ConferenceDate" class="form-control"
                    value="{{ old('date', $conference->date) }}" required />
                <label class="form-label" for="ConferenceDate">Date</label>
            </div>

            <!-- Time input -->

            <!-- Time input -->
            <div class="mb-4 form-outline">
                <input type="time" name="time" id="ConferenceTime" class="form-control"
                    value="{{ old('time', $conference->time) }}" required />
                <label class="form-label" for="ConferenceTime">Time</label>
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
