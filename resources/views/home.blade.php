@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                    @if (Auth::user()->role==='admin')
                      <div class="panel-heading">ADMIN PANEL</div> 
                    @endif
                    @if (Auth::user()->role==='dancer')
                      <div class="panel-heading">DANCERS</div> 
                    @endif
                    @if (Auth::user()->role==='arbiter')
                      <div class="panel-heading">ARBITER PANEL</div> 
                    @endif
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($message = Session::get('message'))

                        <div class="alert alert-danger">

                            <p>{{ $message }}</p>

                        </div>

                     @endif
                    You are logged in as  {{ Auth::user()->role }}
                    @include('includes.menu');
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
