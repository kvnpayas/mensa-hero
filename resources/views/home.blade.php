@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">Welcome!</div>

                <div class="container">
                    <chat-app :user="{{ auth()->user() }}"></chat-app>    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
