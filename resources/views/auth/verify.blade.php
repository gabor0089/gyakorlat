@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Igazold vissza az e-mail címed!') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Egy friss visszaigazoló linket elküldtünk az email címedre.') }}
                        </div>
                    @endif

                    {{ __('Továbblépés előtt kérjük ellenőrizze a visszaigazoló linket az email fiókjában.') }}
                    {{ __('Ha nem kapta meg a visszaigazoló emailt') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __(' kattintson ide egy újabbért.') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
