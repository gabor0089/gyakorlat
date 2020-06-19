@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$question->kerdes}} <BR>Válaszadás ekkor: {{ $question->created_at }} + 10 perc. <BR>
                    Te hány perc alatt írod meg a választ?

                    <form method="POST" action="#">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-2">
                                <input id="mins" type="text" class="form-control @error('mins') is-invalid @enderror" 
                                    name="mins" value="{{ old('mins') }}" required autocomplete="mins" autofocus>

                                @error('mins')
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
