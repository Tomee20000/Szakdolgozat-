@extends('layouts.app')
@section('title', $question->name)
@section('content')
<div class="container">
    <body style="background-color:#547980;">
    @can('update', $question)
        <h1>{{$question->name}}</h1>
    @endcan
    <div class="mb-4">
        <a href="{{route('questions.index')}}" class="btn btn-primary">
            <i class="fas fa-angle-left"></i><span> Vissza a főoldalra</span>
        </a>
    </div>

    @can('update', $question)
    {{-- TODO: action, method, enctype --}}
        <form action="{{route('questions.update', $question)}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            {{-- TODO: Validation --}}

            <div class="container">
                <div class="row">
                    <div class="col-sm-9 card bg-secondary">
                        <div class="form-group row mb-3">
                            <label for="firstquestion" class="col-sm-2 col-form-label py-0"><b>Milyen gyakran tapasztalod ezt a tünetet?</b></label>
                            <div class="col-sm-10 @error('firstquestion') is-invalid @enderror">
                                <div class="form-radio">
                                    <input type="radio" class="form-radio-input" value="1" id="1" name="firstquestion"
                                    @checked($question->question1_points == 1)>
                                    <label for="1" class="form-radio-label"><span>★ Szinte soha</span></label>
                                </div>
                                <div class="form-radio">
                                    <input type="radio" class="form-radio-input" value="2" id="2" name="firstquestion"
                                    @checked($question->question1_points == 2)>
                                    <label for="2" class="form-radio-label"><span>★★ Havonta</span></label>
                                </div>
                                <div class="form-radio">
                                    <input type="radio" class="form-radio-input" value="3" id="3" name="firstquestion"
                                    @checked($question->question1_points == 3)>
                                    <label for="3" class="form-radio-label"><span>★★★ Hetente</span></label>
                                </div>
                                <div class="form-radio">
                                    <input type="radio" class="form-radio-input" value="4" id="4" name="firstquestion"
                                    @checked($question->question1_points == 4)>
                                    <label for="4" class="form-radio-label"><span>★★★★ Naponta</span></label>
                                </div>
                            </div>
                            @error('firstquestion')
                                <div class="invalid-feedback">
                                    {{ "Ez egy radio button, legalább egy dolognak kiválasztva kell lennie!" }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group row mb-3">
                            <label for="secondquestion" class="col-sm-2 col-form-label py-0"><b>Hol van negatív hatása:</b></label>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" value="1" id="secondquestion1" name="secondquestion1"
                                    @checked($question->question2_1)>
                                    <label for="1" class="form-check-label"><span>★ Munka - Iskola</span></label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" value="1" id="secondquestion2" name="secondquestion2"
                                    @checked($question->question2_2)>
                                    <label for="2" class="form-check-label"><span>★ Család - Otthon</span></label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" value="1" id="secondquestion3" name="secondquestion3"
                                    @checked($question->question2_3)>
                                    <label for="3" class="form-check-label"><span>★ Barátok - Hobbi</span></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="thirdquestion" class="col-sm-2 col-form-label py-0"><b>Mit gondosz mióta van jelen ez a tünet az életedben?</b></label>
                            <div class="col-sm-10 @error('thirdquestion') is-invalid @enderror">
                                <div class="form-radio">
                                    <input type="radio" class="form-radio-input" value="1" id="1" name="thirdquestion"
                                    @checked($question->question3_points == 1)>
                                    <label for="1" class="form-radio-label"><span>★ Kevesebb mint hat hónapja</span></label>
                                </div>
                                <div class="form-radio">
                                    <input type="radio" class="form-radio-input" value="2" id="2" name="thirdquestion"
                                    @checked($question->question3_points == 2)>
                                    <label for="2" class="form-radio-label"><span>★★ Több mint hat hónapja</span></label>
                                </div>
                                <div class="form-radio">
                                    <input type="radio" class="form-radio-input" value="3" id="3" name="thirdquestion"
                                    @checked($question->question3_points == 3)>
                                    <label for="3" class="form-radio-label"><span>★★★ Egész életemben jelen volt</span></label>
                                </div>
                            </div>
                            @error('thirdquestion')
                                <div class="invalid-feedback">
                                    {{ "Ez egy radio button, legalább egy dolognak kiválasztva kell lennie!" }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group row mb-3">
                            <label for="memories" class="col-sm-2 col-form-label"><b>Írj le néhány emléket a tünettel kapcsolatban:</b></label>
                            <div class="col-sm-10">
                                <textarea rows="5" class="form-control  @error('memories') is-invalid @enderror" id="memories" name="memories" >{{ old('memories', $question->question4_text)}}</textarea>
                                @error('memories')
                                    <div class="invalid-feedback">
                                        {{ "Ennek a mezőnek legalább 10 karaktert tartalmaznia kell. Töltsd ki kérlek!" }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="impressions" class="col-sm-2 col-form-label"><b>Írd le mások észrevételeit:</b></label>
                            <div class="col-sm-10">
                                <textarea rows="5" class="form-control @error('impressions') is-invalid @enderror" id="impressions" name="impressions">{{ old('impressions', $question->question5_text)}}</textarea>
                                @error('impressions')
                                    <div class="invalid-feedback">
                                        {{ "Ennek a mezőnek legalább 10 karaktert tartalmaznia kell. Töltsd ki kérlek!" }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="text-center">
                            <button href="{{route('questions.update' ,$question)}}" type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Kész</button>
                        </div>
                    </div>
                    <div class="col-sm-3">
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
                                                                <b><li style="color:green; list-style-type:'✓&nbsp;'">
                                                                    <a style="color:green;" href="{{route('questions.edit' ,$question)}}">
                                                                        <span>{{$question->name}}</span>
                                                                    </a>
                                                                </li></b>
                                                            @else
                                                                <b><li style="color:#885053; list-style-type:'X&nbsp;'">
                                                                    <a style="color:#885053;" href="{{route('questions.edit' ,$question)}}">
                                                                        <span>{{$question->name}}</span>
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
        </form>
    @else
    <h1>Nincsen jogosultságod ehhez a kérdéshez!</h1>
    @endcan
</div>
@endsection
