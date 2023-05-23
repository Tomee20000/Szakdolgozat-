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

    <div class="row mt-4">
        <div class="col-12 col-lg-8">
            <div class="row">
                @forelse ($questions as $question)
                    @if ($question->user == Auth::user())
                        <div class="col-12 col-md-6 col-lg-4 mb-4 d-flex align-self-stretch">
                            <div class="card w-100" >
                                <img
                                    src="{{ asset($question->category->cover_image_path) }}"
                                    class="card-img-top"
                                    alt="Question cover"
                                >
                                <div class="card-body" >
                                    <h5 class="card-title mb-0">{{$question->name}}</h5>
                                    <h5 class="card-title" style="color:{{$question->category->color}};">{{$question->category->name}}</h5>
                                    @if ($question->done)
                                        <h5 class="card-title" style="color:green">Állapot: ✓</h5>
                                    @else
                                        <h5 class="card-title" style="color:red">Állapot: X</ h5>
                                    @endif
                                </div>
                                <div class="card-footer">
                                    <a href="{{route('questions.edit' ,$question)}}" class="btn btn-primary">
                                        <span>Téma kérdéseinek kitöltése</span> <i class="fas fa-angle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                @empty
                    <div class="col-12">
                        <div class="alert alert-warning" role="alert">
                            Nincsen felhasználóhoz tartozó kérdés!
                        </div>
                    </div>
                @endforelse
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
                            @foreach ($categories as $category)
                                    <span style="color:{{$category->color}};">{{$category->name}}</span>
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
                                    <li><span class="fa-li"><i class="fas fa-user"></i></span>Felhasználók: {{$users_count}}</li>
                                    <li><span class="fa-li"><i class="fas fa-layer-group"></i></span>Kategóriák: {{$categories_count}}</li>
                                    <li><span class="fa-li"><i class="fas fa-file-alt"></i></span>Témák: {{$questions->count() / $users_count}}</li>
                                    <li><span class="fa-li"><i class="fas fa-file-alt"></i></span>Összes befejezett téma száma: {{$questions->where('done',true)->count()}}</li>
                                    <li><span class="fa-li"><i class="fas fa-file-alt"></i></span>Saját befejezett témák száma: {{$questions->where('user',Auth::user())->where('done',true)->count()}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                @foreach ($categories as $category)
                    <div class="col-12 mb-3">
                        <div class="card bg-secondary">
                            <details open>
                                <summary class="card-header">
                                    <b><span class="icon">{{$category->name}}</span></b>
                                </summary>
                                <div class="small">
                                    <ul class="card-body">
                                        @foreach ($questions->where('category',$category) as $question)
                                            @if ($question->user == Auth::user())
                                                <div class=" d-flex align-self-stretch">
                                                    @if ($question->done)
                                                        <b><li style="color:green; list-style-type:'✓'">
                                                            <a style="color:green;" href="{{route('questions.edit' ,$question)}}">
                                                                <span>&nbsp;{{$question->name}}</span>
                                                            </a>
                                                        </li></b>
                                                    @else
                                                        <b><li style="color:#dc3545; list-style-type:'X'">
                                                            <a style="color:#dc3545;" href="{{route('questions.edit' ,$question)}}">
                                                                <span>&nbsp;{{$question->name}}</span>
                                                            </a>
                                                        </li></b>
                                                    @endif
                                                </div>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </details>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
