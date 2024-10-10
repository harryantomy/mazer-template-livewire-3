<div>
    <x-slot:title>
        Dashboard
    </x-slot>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="order-last mb-3 col-12 col-md-6 order-md-1">
                    <h3>Dashboard</h3>
                </div>
                <div class="order-first col-12 col-md-6 order-md-2">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            {{-- <li class="breadcrumb-item active" aria-current="page">Layout Default</li> --}}
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section" style="min-height: 70vh">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5>Hi, {{ Auth::user()->name }}</h5>
                            <p>Selamat datang di halaman dashboard..</p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="px-4 card-body py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="mb-2 stats-icon red">
                                        <i class="bi-car-front-fill"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="font-semibold text-muted">Transportasi</h6>
                                    <h6 class="mb-0 font-extrabold">{{ $totalTransportasi }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="px-4 card-body py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="mb-2 stats-icon blue">
                                        <i class="bi-signpost-2"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="font-semibold text-muted">Jumlah Rute</h6>
                                    <h6 class="mb-0 font-extrabold">{{ $totalRute }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="px-4 card-body py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="mb-2 stats-icon green">
                                        <i class="iconly-boldAdd-User"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="font-semibold text-muted">Jumlah User</h6>
                                    <h6 class="mb-0 font-extrabold">{{ $totalUser }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="px-4 card-body py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="mb-2 stats-icon red">
                                        <i class="bi-cash-stack"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="font-semibold text-muted">Pendapatan</h6>
                                    <h6 class="mb-0 font-extrabold">Rp
                                        {{ number_format($totalPendapatan, 0, ',', '.') }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </section>
    </div>
</div>
