@extends('fourm.fourm')

@section('content')
<section class="bg-light p-3 p-md-4 p-xl-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-xxl-11">
          <div class="card border-light-subtle shadow-sm">
            <div class="row g-0">
              <div class="col-12 col-md-6">
                <img class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy" src={{ asset('img/details.jpg') }} alt="Welcome back you've been missed!">
              </div>
              <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                <div class="col-12 col-lg-11 col-xl-10">
                  <div class="card-body p-3 p-md-4 p-xl-5">
                    <div class="row">
                      <div class="col-12">
                        <div class="mb-5">
                          <h2 class="h4 text-center">User Details</h2>
                        </div>
                      </div>
                    </div>
                        <form action={{ route('signup.details') }} id="additionalForm" method="POST">
                          @csrf
                          {{-- @method('PUT') --}}
                            <div class="row gy-3 overflow-hidden">
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="address" id="address" placeholder="Address" required>
                                <label for="firstName" class="form-label">Address</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="contactno" id="contactno" placeholder="Contact No" required>
                                <label for="lastName" class="form-label">Contact No</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input type="text" id="datepicker" name ="dob"class="form-control" required>
                                    <label for="email" class="form-label">Date of Birth</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-grid">
                                <button class="btn btn-dark btn-lg" type="submit">Save</button>
                                </div>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection 