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
                        @if(count($user->questions)>0)
                            @foreach($user->questions as $question)
                                <a href='#'>{{$question->kerdes}}</a><BR>
                            @endforeach
                        @else
                            Még nincs saját kérdésed
                        @endif
                @elseif(isset($questions))
                    <div class="card-header">Összes kérdés</div>
                    <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach($questions as $question)
                        <a href="/q/{{ $question['id'] }}">{{ $question['kerdes'] }}</a>
                    @endforeach
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
