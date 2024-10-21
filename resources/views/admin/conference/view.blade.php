@extends('app')
@section('content')
    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="p-3 mb-4 bg-body-tertiary rounded-3">
                        <ol class="mb-0 breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Conferences</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Conference List</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="mb-4 card">
                        <div class="card-body">
                            <h3 class="mb-4 text-center">Conference Details</h3>
                            <div class="mb-3 row">
                                <div class="col-sm-4">
                                    <p class="fw-bold">Conference Name:</p>
                                </div>
                                <div class="col-sm-8">
                                    <p class="text-muted">{{ $conference->name }}</p>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-sm-4">
                                    <p class="fw-bold">Description:</p>
                                </div>
                                <div class="col-sm-8">
                                    <p class="text-muted">{{ $conference->description }}</p>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-sm-4">
                                    <p class="fw-bold">Lecturers:</p>
                                </div>
                                <div class="col-sm-8">
                                    <p class="text-muted">{{ $conference->lecturers }}</p>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-sm-4">
                                    <p class="fw-bold">Date:</p>
                                </div>
                                <div class="col-sm-8">
                                    <p class="text-muted">{{ \Carbon\Carbon::parse($conference->date)->format('F j, Y') }}
                                    </p>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-sm-4">
                                    <p class="fw-bold">Time:</p>
                                </div>
                                <div class="col-sm-8">
                                    <p class="text-muted">{{ $conference->time }}</p>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-sm-4">
                                    <p class="fw-bold">Address:</p>
                                </div>
                                <div class="col-sm-8">
                                    <p class="text-muted">{{ $conference->address }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="mb-4 card">
                        <div class="card-body">
                            <div class="container mt-5">
                                <h2 class="mb-4 text-center" style="color: #4a90e2;">Registered Users</h2>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Sur Name</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->sur_name }}</td>
                                                <td>
                                                    <a href="{{ route('admin.user.show', $user->id) }}"
                                                        class="btn btn-primary btn-sm">View</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
