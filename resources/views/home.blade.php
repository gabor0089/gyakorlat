@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if(isset($user)) <!--ha van egy adott user, akinek a kérdéseit megtekintjük-->
                <div class="card-header">Kérdéseid</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        @if(count($user->questions)>0) <!-- Ha az adott usernek már vannak kérdései-->
                            @foreach($user->questions as $question)
                                <a href="/q/{{ $question['id'] }}">{{$question->kerdes}} ({{$question->answer->count()}} válasz)</a><BR>
                            @endforeach
                        @else <!-- Ha még nincs -->
                            Még nincs saját kérdésed
                        @endif
                @elseif(isset($questions)) <!-- Usertől függetlenül megnézzük az összes kérdést-->
                    <div class="card-header">Összes kérdés</div>
                    <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($questions as $question)
                        <a href="/q/{{ $question['id'] }}">{{ $question->kerdes }} ({{$question->answer->count()}} válasz)</a><BR>
                    @endforeach
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
