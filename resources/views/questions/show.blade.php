@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                    @if(!isset($question->tip[0]['tip']))
                    <div class="card-header">{{$question->kerdes}} <BR>Válaszadás ekkor: {{ $question->created_at }} + 10 perc. <BR>
                        Te hány perc alatt írod meg a választ?

                    <form method="POST" action="/tip">
                        @csrf
                        <input id='question_id' type='hidden' name='question_id' value='{{$question->id}}'>
                        <div class="form-group row">
                            <div class="col-md-2">
                                <input id="tip" type="text" class="form-control @error('tip') is-invalid @enderror" 
                                    name="tip" value="{{ old('tip') }}" required autocomplete="tip" autofocus>

                                @error('tip')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-1 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('->') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    @else
                        <div class="card-header">{{$question->kerdes}} <BR>
                        A válaszod:
                        <form method="POST" action="/answer">
                        @csrf
                        <input id='question_id' type='hidden' name='question_id' value='{{$question->id}}'>
                        <div class="form-group row">
                            <div class="col-md-8">
                                <input id="valasz" type="text" class="form-control @error('valasz') is-invalid @enderror" 
                                    name="valasz" value="{{ old('valasz') }}" required autocomplete="valasz" autofocus>

                                @error('valasz')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-1 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Válasz beküldése') }}
                                </button>
                            </div>
                        </div>
                    </form>

                    @endif

                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>



</div>
@endsection
