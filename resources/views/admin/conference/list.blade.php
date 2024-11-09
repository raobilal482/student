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

    <div class="container mt-5">
        <h2 class="mb-4 text-center" style="color: #4a90e2;">Conference List</h2>

        <!-- Create Conference Button -->
        <div class="mb-3 text-end">
                    <a href="{{ route('admin.user.index') }}" type="button" data-mdb-button-init
                        data-mdb-ripple-init class="btn btn-primary me-1 flex-grow-1">User Panel</a>
            
            <a href="{{ route('conference.create') }}" class="btn btn-success">Create Conference</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Lecturers</th>
                    <th scope="col">Address</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($conferences as $conference)
                    <tr>
                        <th scope="row">{{ $conference->id }}</th>
                        <td>{{ $conference->name }}</td>
                        <td>{{ $conference->date }}</td>
                        <td>{{ $conference->time }}</td>
                        <td>{{ $conference->lecturers }}</td>
                        <td>{{ $conference->address }}</td>
                        <td>
                            <a href="{{ route('conference.show', $conference->id) }}"
                               class="btn btn-primary btn-sm">View</a>
                            <a href="{{ route('conference.edit', $conference->id) }}"
                               class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('conference.destroy', $conference->id) }}" method="post"
                                  style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        @if ($conference->date > now()) disabled @endif
                                        class="btn btn-sm {{ $conference->date > now() ? 'btn-secondary' : 'btn-danger' }}">
                                    Delete
                                </button>
                            </form>
                        </td>                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
