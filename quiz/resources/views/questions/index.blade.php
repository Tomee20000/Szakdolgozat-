@extends('layouts.app')
@section('title', 'Kérdések')

@section('content')
<div class="container">
    <div class="row justify-content-between">
        <body style="background-color:#547980;">
        <div class="col-12 col-md-8">
            <h1>Összes téma</h1>
        </div>
    </div>

    {{-- TODO: Session flashes --}}

    <div class="row mt-3">
        <div class="col-12 col-lg-9">
            <div class="row">
                {{-- TODO: Read posts from DB --}}

                @forelse ([1,2,3,4,5] as $post)
                    <div class="col-12 col-md-6 col-lg-4 mb-3 d-flex align-self-stretch">
                        <div class="card w-100" >
                            <img
                                src="{{ asset('images/adhd3.png') }}"
                                class="card-img-top"
                                alt="Post cover"
                            >
                            <div class="card-body" >
                                {{-- TODO: Title --}}
                                <h5 class="card-title mb-0">Post title</h5>

                                {{-- TODO: Read post categories from DB --}}
                                @foreach (['primary', 'secondary','danger', 'warning', 'info', 'dark'] as $category)
                                    <a href="#" class="text-decoration-none">
                                        <span class="badge" style="color: black">Category</span>
                                    </a>
                                @endforeach

                                {{-- TODO: Short desc --}}
                                <p class="card-text mt-1">Short description</p>
                            </div>
                            <div class="card-footer">
                                {{-- TODO: Link --}}
                                <a href="" class="btn btn-primary">
                                    <span>Téma kérdéseinek kitöltése</span> <i class="fas fa-angle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-warning" role="alert">
                            No posts found!
                        </div>
                    </div>
                @endforelse
            </div>

            <div class="d-flex justify-content-center">
                {{-- TODO: Pagination --}}
            </div>

        </div>
        <div class="col-12 col-lg-3">
            <div class="row">
                <div class="col-12 mb-3">
                    <div class="card bg-secondary">
                        <div class="card-header">
                            Kategóriák
                        </div>
                        <div class="card-body">
                            {{-- TODO: Read categories from DB --}}
                            @foreach (['primary', 'secondary','danger', 'warning', 'info', 'dark'] as $category)
                                <a href="#" class="text-decoration-none">
                                    <span class="badge" style="color: black">Category</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <div class="card bg-secondary">
                        <div class="card-header">
                            Statisztika
                        </div>
                        <div class="card-body">
                            <div class="small">
                                <ul class="fa-ul">
                                    {{-- TODO: Read stats from DB --}}
                                    <li><span class="fa-li"><i class="fas fa-user"></i></span>Users: N/A</li>
                                    <li><span class="fa-li"><i class="fas fa-layer-group"></i></span>Categories: N/A</li>
                                    <li><span class="fa-li"><i class="fas fa-file-alt"></i></span>Posts: N/A</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
