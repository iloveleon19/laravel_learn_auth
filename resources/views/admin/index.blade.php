@extends('admin.layouts.app')

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Dashboard</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <h1>You are logged in!</h1>
                <p>Hello {{ Auth::guard('admin')->user()->name }}</p>
            </div>
        </div>
    </div>
@endsection
