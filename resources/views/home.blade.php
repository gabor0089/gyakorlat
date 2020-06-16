@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Legújabb kérdések</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Be vagy lépve!
                    <br>Itt lesznek a kérdések
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
