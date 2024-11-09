@extends('app') <!-- Make sure this points to your main layout file -->
@section('content')
    <section class="px-4 py-5 w-100" style="background-color: #9de2ff; border-radius: .5rem .5rem 0 0;">
        <div class="row d-flex justify-content-center">
            <div class="col col-md-9 col-lg-7 col-xl-6">
                <div class="card" style="border-radius: 15px;">
                    <div class="p-4 card-body">
                        <div class="d-flex">
                           
                            <div class="flex-grow-1 ms-3">
                                <div class="pt-1 d-flex">
                                    <a href="{{ route('admin.user.index') }}" type="button" data-mdb-button-init
                                        data-mdb-ripple-init class="btn btn-outline-primary me-1 flex-grow-1">User Management</a>
                                    <a href="{{ route('conference.index') }}" type="button" data-mdb-button-init
                                        data-mdb-ripple-init class="btn btn-outline-primary flex-grow-1">Conference Management</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
