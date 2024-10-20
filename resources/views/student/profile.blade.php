@extends('welcome')  <!-- Make sure this points to your main layout file -->
@section('content')
<section class="w-100 px-4 py-5" style="background-color: #9de2ff; border-radius: .5rem .5rem 0 0;">
    <div class="row d-flex justify-content-center">
      <div class="col col-md-9 col-lg-7 col-xl-6">
        <div class="card" style="border-radius: 15px;">
          <div class="card-body p-4">
            <div class="d-flex">
              <div class="flex-shrink-0">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-profiles/avatar-1.webp"
                  alt="Generic placeholder image" class="img-fluid" style="width: 180px; border-radius: 10px;">
              </div>
              <div class="flex-grow-1 ms-3">
                <h5 class="mb-1">Danny McLoan</h5>
                <p class="mb-2 pb-1">Senior Journalist</p>
               
                <div class="d-flex pt-1">
                  <a href="{{ route('client.index') }}" type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-primary me-1 flex-grow-1">Client System</a>
                  <a href="{{ route('employee.index') }}" type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary flex-grow-1">Employee System</a>
                </div>
                <div class="d-flex dropdown mt-3">
                  <button class="btn dropdown-toggle btn-outline-primary me-1 flex-grow-1" type="button" data-bs-toggle="dropdown">
                    Admin Panel
                  </button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('admin.user.index') }}">User Management</a></li>
                    <li><a class="dropdown-item" href="{{ route('conference.index') }}">Conference Management</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection