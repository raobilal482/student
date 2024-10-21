@extends('app')

@section('content')
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="p-4 card" style="width: 400px;">
            <h1 class="mb-4 text-center">Enter Details</h1> <!-- Heading added -->

            <form action="{{ route('student.register') }}" method="POST">
                @csrf
                <div data-mdb-input-init class="mb-4 form-outline">
                    <input type="text" id="email" name="email" class="form-control" />
                    <label class="form-label" for="name">Enter Your Email</label>
                </div>
                <!-- Name input -->
                <div data-mdb-input-init class="mb-4 form-outline">
                    <input type="text" id="name" name="name" class="form-control" />
                    <label class="form-label" for="name">Enter Your Name</label>
                </div>

                <!-- Surname input -->
                <div data-mdb-input-init class="mb-4 form-outline">
                    <input type="text" id="sur_name" name="sur_name" class="form-control" />
                    <label class="form-label" for="sur_name">Enter Surname</label>
                </div>

                <!-- Group input -->
                <div data-mdb-input-init class="mb-4 form-outline">
                    <input type="text" id="group" name="group" class="form-control" />
                    <label class="form-label" for="group">Enter Your Group</label>
                </div>



                <!-- Submit button -->
                <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block">Go To Profile Page</button>
            </form>
        </div>
    </div>
@endsection
