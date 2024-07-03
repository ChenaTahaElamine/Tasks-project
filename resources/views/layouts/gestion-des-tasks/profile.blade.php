@extends('layouts.app')

@section('content')
    <div class="container">
        <section class="w-100 px-4 py-5" style="background-color: #000000; border-radius: .5rem .5rem 0 0;">
            <div class="row d-flex justify-content-center">
                <div class="col col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-4">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <img src="https://th.bing.com/th/id/OIP.rcmXeqCUOiCg54dfU4v9tgHaHa?w=211&h=211&c=7&r=0&o=5&dpr=1.7&pid=1.7"
                                        alt="Generic placeholder image" class="img-fluid"
                                        style="width: 180px; border-radius: 10px;">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-1">{!! Auth::user()->nom !!} {!! Auth::user()->prenom !!}</h5>
                                    <p class="mb-2 pb-1">{!! Auth::user()->email !!}</p>
                                    <div class="d-flex justify-content-start rounded-3 p-2 mb-2 bg-body-tertiary">
                                        @php
                                            $user = Auth::user();
                                            $appliqueCount = $user->sesTaches()->where('status', 'applique')->count();
                                            $otherCount = $user
                                                ->sesTaches()
                                                ->where('status', '!=', 'applique')
                                                ->count();
                                        @endphp
                                        <div>
                                            <p class="small text-muted mb-1">Tasks appliquer</p>
                                            <p class="mb-0">{{ $appliqueCount }}</p>
                                        </div>
                                        <div class="px-3">
                                            <p class="small text-muted mb-1">Tasks pas appliquer</p>
                                            <p class="mb-0">{!! $otherCount !!}</p>
                                        </div>

                                    </div>
                                    <div class="d-flex pt-1">
                                        <a href="{{ route('home') }}" data-mdb-button-init data-mdb-ripple-init
                                            class="btn btn-outline-primary me-1 flex-grow-1">
                                            Page accueil
                                        </a>
                                        {{-- <button type="button" data-mdb-button-init data-mdb-ripple-init
                                            class="btn btn-outline-primary me-1 flex-grow-1">Page accueil</button> --}}
                                        
                                        <button type="button" data-mdb-button-init data-mdb-ripple-init
                                            class="btn btn-primary flex-grow-1">Modifer</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
