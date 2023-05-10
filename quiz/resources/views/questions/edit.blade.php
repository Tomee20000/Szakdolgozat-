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
        <form>

            {{-- TODO: Validation --}}

            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="form-group row mb-3">
                            <label for="thirdquestion" class="col-sm-2 col-form-label py-0"><b>Milyen gyakran tapasztalod ezt a tünetet??</b></label>
                            <div class="col-sm-10">
                                <div class="form-radio">
                                    <input type="radio" class="form-radio-input" value="1" id="1" name="firstquestion" checked="checked">
                                    <label for="1" class="form-radio-label"><span>★ Szinte soha</span></label>
                                </div>
                                <div class="form-radio">
                                    <input type="radio" class="form-radio-input" value="2" id="2" name="firstquestion">
                                    <label for="2" class="form-radio-label"><span>★★ Havonta</span></label>
                                </div>
                                <div class="form-radio">
                                    <input type="radio" class="form-radio-input" value="3" id="3" name="firstquestion">
                                    <label for="3" class="form-radio-label"><span>★★★ Hetente</span></label>
                                </div>
                                <div class="form-radio">
                                    <input type="radio" class="form-radio-input" value="4" id="4" name="firstquestion">
                                    <label for="4" class="form-radio-label"><span>★★★★ Naponta</span></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="secondquestion" class="col-sm-2 col-form-label py-0"><b>Itt van negatív hatása:</b></label>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" value="1" id="1" name="secondquestion" checked="checked">
                                    <label for="1" class="form-check-label"><span>★ Munka - Iskola</span></label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" value="1" id="2" name="secondquestion">
                                    <label for="2" class="form-check-label"><span>★ Család - Otthon</span></label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" value="1" id="3" name="secondquestion">
                                    <label for="3" class="form-check-label"><span>★ Barátok - Hobbi</span></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="thirdquestion" class="col-sm-2 col-form-label py-0"><b>Mit gondosz mióta van jelen ez a tünet az életedben?</b></label>
                            <div class="col-sm-10">
                                <div class="form-radio">
                                    <input type="radio" class="form-radio-input" value="1" id="1" name="thirdquestion" checked="checked">
                                    <label for="1" class="form-radio-label"><span>★ Kevesebb mint hat hónapja</span></label>
                                </div>
                                <div class="form-radio">
                                    <input type="radio" class="form-radio-input" value="2" id="2" name="thirdquestion">
                                    <label for="2" class="form-radio-label"><span>★★ Több mint hat hónapja</span></label>
                                </div>
                                <div class="form-radio">
                                    <input type="radio" class="form-radio-input" value="3" id="3" name="thirdquestion">
                                    <label for="3" class="form-radio-label"><span>★★★ Egész életemben jelen volt</span></label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="text" class="col-sm-2 col-form-label"><b>Írj le néhány eléket a tünettel kapcsolatban:</b></label>
                            <div class="col-sm-10">
                                <textarea rows="5" class="form-control" id="text" name="text"></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="text" class="col-sm-2 col-form-label"><b>Írd le mások észrevételeit:</b></label>
                            <div class="col-sm-10">
                                <textarea rows="5" class="form-control" id="text" name="text"></textarea>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Kész</button>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        @foreach ($categories as $category)
                        <details open>
                            <summary>
                                <span class="icon">{{$category->name}}</span>
                            </summary>
                            <ul>
                            @foreach ($questions->where('category',$category) as $question)
                                @if ($question->user == Auth::user())
                                    <div class=" d-flex align-self-stretch">
                                        @if ($question->done)
                                            <li style="color:green; list-style-type:'✓'">&nbsp;{{$question->name}}</li>
                                        @else
                                            <li style="color:#dc3545; list-style-type:'X'">&nbsp;{{$question->name}}</li>
                                        @endif
                                    </div>
                                @endif
                            @endforeach
                                </ul>
                        </details>
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
