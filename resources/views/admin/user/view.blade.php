@extends('app')
@section('content')
    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="p-3 mb-4 bg-body-tertiary rounded-3">
                        <ol class="mb-0 breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">User</a></li>
                            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="mb-4 card">
                        <div class="text-center card-body">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                                alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3">{{ $user->name }}</h5>
                            <p class="mb-1 text-muted">{{ $user->sur_name }}r</p>

                        </div>
                    </div>

                </div>
                <div class="col-lg-8">
                    <div class="mb-4 card">
                        <div class="card-body">

                            <div class="container mt-5">
                                <h2 class="mb-4 text-center" style="color: #4a90e2;">Registered Conference </h2>

                                <table class="table table-striped">
                                    <thead>
                                        <tr>
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
                                                <td>{{ $conference->name }}</td>
                                                <td>{{ $conference->date }}</td>
                                                <td>{{ $conference->time }}</td>
                                                <td>{{ $conference->lecturers }}</td>
                                                <td>{{ $conference->address }}</td>
                                                <td class="d-flex">
                                                    <a href="{{ route('client.show', $conference->id) }}"
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
