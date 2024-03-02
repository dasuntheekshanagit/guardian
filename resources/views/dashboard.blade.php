@extends('layout.main')

@section('content')
<div class="container">
            <div class="row">
                 <div class="col-lg-10 mx-auto mb-4">
                    <div class="section-title text-center ">
                        <h3 class="top-c-sep">Get All Your Medicine</h3>
                        <p>Lorem ipsum dolor sit detudzdae amet, rcquisc adipiscing elit. Aenean socada commodo
                            ligaui egets dolor. Nullam quis ante tiam sit ame orci eget erovtiu faucid.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="career-search mb-60">

                        <form action="#" class="career-form mb-60">
                            <div class="row">
                                <div class="col-md-12 col-lg-8 my-3">
                                    <div class="input-group position-relative">
                                        <input type="text" class="form-control" placeholder="Enter Your Keywords" id="keywords">
                                    </div>
                                </div>
                                {{-- <div class="col-md-6 col-lg-3 my-3">
                                    <div class="select-container">
                                        <select class="custom-select">
                                            <option selected="">Location</option>
                                            <option value="1">Jaipur</option>
                                            <option value="2">Pune</option>
                                            <option value="3">Bangalore</option>
                                        </select>
                                    </div>
                                </div> --}}
                                {{-- <div class="col-md-6 col-lg-3 my-3">
                                    <div class="select-container">
                                        <select class="custom-select">
                                            <option selected="">Select Job Type</option>
                                            <option value="1">Ui designer</option>
                                            <option value="2">JS developer</option>
                                            <option value="3">Web developer</option>
                                        </select>
                                    </div>
                                </div> --}}
                                <div class="col-md-6 col-lg-2 my-3 d-flex justify-content-center align-items-center">
                                    <button type="button" class="btn btn-lg btn-block btn-light btn-custom mx-2" id="contact-submit">
                                        Search
                                    </button>
                                </div>
                                <div class="col-md-6 col-lg-2 my-3 d-flex justify-content-center align-items-center">
                                    <button type="button" class="btn btn-lg btn-block btn-success btn-custom mx-2" id="contact-submit">
                                       <a href="/add" style="text-decoration: none; color: inherit;"> + New</a>
                                    </button>
                                </div>
                            </div>
                        </form>

                        <div class="filter-result">
                            {{-- <p class="mb-30 ff-montserrat">Total Job Openings : 89</p> --}}

                            @foreach ($prescriptions as $prescription)
                            @php
                                $bgClass = '';
                                $text = '';
                                if ($prescription->status === 'pending') {
                                    $bgClass = 'bg-warning';
                                    $text = 'Pending..';
                                } elseif ($prescription->status === 'accept') {
                                    $bgClass = 'bg-success';
                                    $text = 'Accept';
                                } elseif ($prescription->status === 'agree') {
                                    $bgClass = 'bg-danger';
                                    $text = 'Remove';
                                }
                            @endphp
                                <div class="job-box d-md-flex align-items-center justify-content-between mb-30 {{ $bgClass }}">
                                    <div class="job-left my-4 d-md-flex align-items-center flex-wrap">
                                        <div class="img-holder mr-md-4 mb-md-0 mb-4 mx-auto mx-md-0 d-md-none d-lg-flex">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($prescription->{'image'.$i})
                                                <img src="{{ Storage::url($prescription->{'image'.$i}) }}" alt="Prescription Image" class="img-thumbnail">
                                                @endif
                                            @endfor
                                        </div>
                                        <div class="job-content" style="margin-left: 20px;">
                                            <h5 class="text-center text-md-left">{{ $prescription->title }}</h5>
                                            <ul class=" flex-wrap text-capitalize ff-open-sans">
                                                <li class="mr-md-4">
                                                    <i class="zmdi zmdi-pin mr-2"></i> {{ $prescription->address }}
                                                </li>
                                                <li class="mr-md-4">
                                                    <i class="zmdi zmdi-phone mr-2"></i> {{ $prescription->contactno }}
                                                </li>
                                                <li class="mr-md-4">
                                                    <i class="zmdi zmdi-comment-text-alt mr-2"></i> {{ $prescription->note }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="job-right my-4 flex-shrink-0" >
                                        <a href="prescriptions/{{$prescription->id}}/quotations" class="btn d-block w-100 d-sm-inline-block btn-light">{{ $text }}</a>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>

                    <!-- START Pagination -->
                    <nav aria-label="Page navigation">
                        <ul class="pagination pagination-reset justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                    <i class="zmdi zmdi-long-arrow-left"></i>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item d-none d-md-inline-block"><a class="page-link" href="#">2</a></li>
                            <li class="page-item d-none d-md-inline-block"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">8</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">
                                    <i class="zmdi zmdi-long-arrow-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- END Pagination -->
                </div>
            </div>

        </div>

@endsection