@extends('fourm.fourm')

@section('content')
<section class="bg-light p-3 p-md-4 p-xl-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-xxl-11">
          <div class="card border-light-subtle shadow-sm">
            <div class="row g-0">
              <div class="col-12 col-md-6">
                <img class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy" src={{ asset('img/signup.jpg') }} alt="Welcome back you've been missed!">
              </div>
              <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                <div class="col-12 col-lg-11 col-xl-10">
                  <div class="card-body p-3 p-md-4 p-xl-5">
                    <div class="row">
                      <div class="col-12">
                        <div class="mb-5">
                          <h2 class="h4 text-center">Registration</h2>
                        </div>
                      </div>
                    </div>
                    <form action={{ route('signup.create') }} id="initialForm" method="POST">
                      @csrf
                      <div class="row gy-3 overflow-hidden">
                        <div class="col-12">
                          <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('firstName') is-invalid @enderror" name="firstName" id="firstName" placeholder="First Name" required>
                            <label for="firstName" class="form-label">First Name</label>
                            @error('firstName')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                            @enderror
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" id="lastName" placeholder="Last Name" required>
                            <label for="lastName" class="form-label">Last Name</label>
                            @error('lastName')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                            @enderror
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-floating mb-3">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com" required>
                            <label for="email" class="form-label">Email</label>
                            @error('email')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                            @enderror
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-floating mb-3">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" value="" placeholder="Password" required>
                            <label for="password" class="form-label">Password</label>
                            @error('password')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                            @enderror
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-floating mb-3">
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation" value="" placeholder="Retype Password" required>
                            <label for="password_confirmation" class="form-label">Retype Password</label>
                            @error('password_confirmation')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                            @enderror
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" name="iAgree" id="iAgree" required>
                            <label class="form-check-label text-secondary" for="iAgree">
                              I agree to the <a href="#!" class="link-primary text-decoration-none">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="d-grid">
                            <button class="btn btn-dark btn-lg" type="submit">Sign up</button>
                          </div>
                        </div>
                      </div>
                    </form>
                    <div class="row" id="account">
                      <div class="col-12">
                        <p class="mb-0 mt-5 text-secondary text-center">Already have an account? <a href="#!" class="link-primary text-decoration-none">Sign in</a></p>
                      </div>
                    </div>
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