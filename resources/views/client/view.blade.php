@extends('app')

@section('content')
<section style="background-color: #f8f9fa;">
    <div class="container py-5">
        <div class="mb-4 row">
            <div class="col">
                <nav aria-label="breadcrumb" class="p-3 bg-light rounded-3">
                    <ol class="mb-0 breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">User</a></li>
                        <li class="breadcrumb-item"><a href="#">Conference</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Conference Details</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="mx-auto col-lg-8">
                <div class="mb-4 shadow-sm card">
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
                                <p class="text-muted">{{ \Carbon\Carbon::parse($conference->date)->format('F j, Y') }}</p>
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
                <div class="text-center">
                    <button onclick="window.history.back();" class="btn btn-secondary">Back</button>
                </div>
                
            </div>
        </div>
    </div>
</section>
@endsection
