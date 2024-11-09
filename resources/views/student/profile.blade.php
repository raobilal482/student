@extends('app')

@section('content')
    <section class="px-4 py-5 w-100" style="background-color: #9de2ff; border-radius: .5rem .5rem 0 0;">
        <div class="row d-flex justify-content-center">
            <div class="col col-md-9 col-lg-7 col-xl-6">
                <div class="card" style="border-radius: 15px;">
                    <div class="p-4 card-body">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-profiles/avatar-1.webp"
                                    alt="Generic placeholder image" class="img-fluid"
                                    style="width: 180px; border-radius: 10px;">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="mb-1">Name: {{ $student->name }}</h5>
                                <p class="pb-1 mb-2">Sur Name: {{ $student->sur_name }}</p>
                                <p class="pb-1 mb-2">Group: {{ $student->group }}</p>

                                <!-- Check if the user is logged in -->
                                @auth
                                    @if (auth()->user()->type == 'client')
                                        <div class="pt-1 d-flex">
                                            <a href="{{ route('client.index') }}" type="button" class="btn btn-outline-primary me-1 flex-grow-1">Client System</a>
                                        </div>
                                    @elseif (auth()->user()->type == 'employee')
                                        <div class="pt-1 d-flex">
                                            <a href="{{ route('employee.index') }}" type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary flex-grow-1">Employee System</a>
                                        </div>
                                    @elseif (auth()->user()->type == 'admin')
                                        <div class="mt-3 d-flex">
                                            <a class="btn btn-primary flex-grow-1" href="{{ route('admin.main') }}">Admin Panel</a>
                                        </div>
                                    @else
                                        <div class="pt-1 d-flex">
                                            <a href="{{ route('login') }}" class="btn btn-outline-primary flex-grow-1">Login to Access System</a>
                                        </div>
                                    @endif
                                @else
                                    <div class="pt-1 d-flex">
                                        <a href="{{ route('login') }}" class="btn btn-outline-primary flex-grow-1">Login to Access System</a>
                                    </div>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
