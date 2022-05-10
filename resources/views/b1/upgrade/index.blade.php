@extends('master')
@section('css')
<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css') }}">
<link rel="stylesheet" type="text/css"
    href="{{ asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css"
    href="{{ asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css"
    href="{{ asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css') }}">
<!-- END: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/page-pricing.css') }}">
@endsection
@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="container-xxl flex-grow-1 container-p-y">


            <div class="card">
                <!-- Pricing Plans -->
                <div class="pricing-plans pb-sm-5 pb-2 rounded-top">
                    <div class="container py-5">
                        <h2 class="text-center mb-4">Find the right plan for your site</h2>
                        <p class="text-center"> Get started with us - it's perfect for individuals and teams. Choose a
                            subscription plan that meets your needs. </p>
                        <div class="row mx-0 gy-3">
                            <!-- Starter -->
                            <div class="col-xl mb-lg-0 lg-4">
                                <div class="card border shadow-none">
                                    <div class="card-body">
                                        <h5 class="text-start text-uppercase">Starter</h5>

                                        <div class="text-center position-relative pb-1">
                                            <div class="mb-2 d-flex">
                                                <h1 class="price-toggle text-primary price-yearly mb-0">$49</h1>
                                                <h1 class="price-toggle text-primary price-monthly mb-0 d-none">$99</h1>
                                                <sub class="h5 text-muted pricing-duration mt-auto mb-2">/10 Days</sub>
                                            </div>
                                        </div>

                                        <p>All the basics for business that are just getting started</p>

                                        <hr>

                                        <ul class="list-unstyled pt-2 pb-1">
                                            <li class="mb-2">
                                                <span
                                                    class="badge badge-center w-px-20 h-px-20 rounded-pill bg-label-primary me-2">
                                                    <i class="bx bx-check bx-xs"></i>
                                                </span>
                                                Up to 10 users
                                            </li>
                                            <li class="mb-2">
                                                <span
                                                    class="badge badge-center w-px-20 h-px-20 rounded-pill bg-label-primary me-2">
                                                    <i class="bx bx-check bx-xs"></i>
                                                </span>
                                                150+ components
                                            </li>
                                            <li class="mb-2">
                                                <span
                                                    class="badge badge-center w-px-20 h-px-20 rounded-pill bg-label-primary me-2">
                                                    <i class="bx bx-check bx-xs"></i>
                                                </span>
                                                Basic support on Github
                                            </li>
                                            <li class="mb-2">
                                                <span
                                                    class="badge badge-center w-px-20 h-px-20 rounded-pill bg-label-secondary me-2">
                                                    <i class="bx bx-x fs-5 lh-1"></i>
                                                </span>
                                                Monthly updates
                                            </li>
                                            <li class="mb-2">
                                                <span
                                                    class="badge badge-center w-px-20 h-px-20 rounded-pill bg-label-secondary me-2">
                                                    <i class="bx bx-x fs-5 lh-1"></i>
                                                </span>
                                                Integrations
                                            </li>
                                            <li class="mb-2">
                                                <span
                                                    class="badge badge-center w-px-20 h-px-20 rounded-pill bg-label-secondary me-2">
                                                    <i class="bx bx-x fs-5 lh-1"></i>
                                                </span>
                                                Full Support
                                            </li>
                                        </ul>
                                        <form action="{{ route('upgrade.planner.plan.submit') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="10">
                                            <button class="btn btn-label-primary d-grid w-100">Get Started</button>
                                        </form>
                                        {{-- <a href="{{ route('upgrade.planner.plan.submit', ['id'=>1]) }}"
                                            class="btn btn-label-primary d-grid w-100">Get Started</a> --}}
                                    </div>
                                </div>
                            </div>

                            <!-- Exclusive -->
                            <div class="col-xl mb-lg-0 lg-4">
                                <div class="card border border-2 border-primary">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between flex-wrap">
                                            <h5 class="text-start text-uppercase mb-0">Pro / 15% OFF</h5>
                                            <span class="badge bg-primary rounded-pill">Popular</span>
                                        </div>

                                        <div class="text-center position-relative pb-1">
                                            <div class="mb-2 d-flex">
                                                <h1 class="price-toggle text-primary price-yearly mb-0">$99</h1>
                                                <h1 class="price-toggle text-primary price-monthly mb-0 d-none">$199
                                                </h1>
                                                <sub class="h5 text-muted pricing-duration mt-auto mb-2">/20 Days</sub>
                                            </div>
                                        </div>
                                        <p>Batter for growing business that want to more customers</p>

                                        <hr>

                                        <ul class="list-unstyled pt-2 pb-1">
                                            <li class="mb-2">
                                                <span
                                                    class="badge badge-center w-px-20 h-px-20 rounded-pill bg-label-primary me-2">
                                                    <i class="bx bx-check bx-xs"></i>
                                                </span>
                                                Up to 10 users
                                            </li>
                                            <li class="mb-2">
                                                <span
                                                    class="badge badge-center w-px-20 h-px-20 rounded-pill bg-label-primary me-2">
                                                    <i class="bx bx-check bx-xs"></i>
                                                </span>
                                                150+ components
                                            </li>
                                            <li class="mb-2">
                                                <span
                                                    class="badge badge-center w-px-20 h-px-20 rounded-pill bg-label-primary me-2">
                                                    <i class="bx bx-check bx-xs"></i>
                                                </span>
                                                Basic support on Github
                                            </li>
                                            <li class="mb-2">
                                                <span
                                                    class="badge badge-center w-px-20 h-px-20 rounded-pill bg-label-primary me-2">
                                                    <i class="bx bx-check bx-xs"></i>
                                                </span>
                                                Monthly updates
                                            </li>
                                            <li class="mb-2">
                                                <span
                                                    class="badge badge-center w-px-20 h-px-20 rounded-pill bg-label-secondary me-2">
                                                    <i class="bx bx-x fs-5 lh-1"></i>
                                                </span>
                                                Integrations
                                            </li>
                                            <li class="mb-2">
                                                <span
                                                    class="badge badge-center w-px-20 h-px-20 rounded-pill bg-label-secondary me-2">
                                                    <i class="bx bx-x fs-5 lh-1"></i>
                                                </span>
                                                Full Support
                                            </li>
                                        </ul>
                                        <form action="{{ route('upgrade.planner.plan.submit') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="20">
                                            <button class="btn btn-primary d-grid w-100">Get Started</button>
                                        </form>
                                        {{-- <a href="{{ route('upgrade.planner.plan.submit', ['id'=>2]) }}" class="btn btn-primary d-grid w-100">Get
                                            Started</a> --}}
                                    </div>
                                </div>
                            </div>

                            <!-- Enterprise -->
                            <div class="col-xl mb-lg-0 lg-4">
                                <div class="card border shadow-none">
                                    <div class="card-body">
                                        <h5 class="text-start text-uppercase">ENTERPRISE</h5>

                                        <div class="text-center position-relative pb-1">
                                            <div class="mb-2 d-flex">
                                                <h1 class="price-toggle text-primary price-yearly mb-0">$149</h1>
                                                <h1 class="price-toggle text-primary price-monthly mb-0 d-none">$499
                                                </h1>
                                                <sub class="h5 text-muted pricing-duration mt-auto mb-2">/30 Days</sub>
                                            </div>
                                        </div>
                                        <p>Advance features for enterprise who need more customization</p>

                                        <hr>

                                        <ul class="list-unstyled pt-2 pb-1">
                                            <li class="mb-2">
                                                <span
                                                    class="badge badge-center w-px-20 h-px-20 rounded-pill bg-label-primary me-2">
                                                    <i class="bx bx-check bx-xs"></i>
                                                </span>
                                                Up to 10 users
                                            </li>
                                            <li class="mb-2">
                                                <span
                                                    class="badge badge-center w-px-20 h-px-20 rounded-pill bg-label-primary me-2">
                                                    <i class="bx bx-check bx-xs"></i>
                                                </span>
                                                150+ components
                                            </li>
                                            <li class="mb-2">
                                                <span
                                                    class="badge badge-center w-px-20 h-px-20 rounded-pill bg-label-primary me-2">
                                                    <i class="bx bx-check bx-xs"></i>
                                                </span>
                                                Basic support on Github
                                            </li>
                                            <li class="mb-2">
                                                <span
                                                    class="badge badge-center w-px-20 h-px-20 rounded-pill bg-label-primary me-2">
                                                    <i class="bx bx-check bx-xs"></i>
                                                </span>
                                                Monthly updates
                                            </li>
                                            <li class="mb-2">
                                                <span
                                                    class="badge badge-center w-px-20 h-px-20 rounded-pill bg-label-primary me-2">
                                                    <i class="bx bx-check bx-xs"></i>
                                                </span>
                                                Integrations
                                            </li>
                                            <li class="mb-2">
                                                <span
                                                    class="badge badge-center w-px-20 h-px-20 rounded-pill bg-label-primary me-2">
                                                    <i class="bx bx-check bx-xs"></i>
                                                </span>
                                                Full Support
                                            </li>
                                        </ul>
                                        <form action="{{ route('upgrade.planner.plan.submit') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="30">
                                                <button class="btn btn-label-primary d-grid w-100">Get Started</button>
                                            </form>
                                            {{-- <a href="{{ route('upgrade.planner.plan.submit', ['id'=>3]) }}"
                                                class="btn btn-label-primary d-grid w-100">Get Started</a> --}}
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
</div>
@endsection
@section('js')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/js/pages-pricing.js') }}">
@endsection
