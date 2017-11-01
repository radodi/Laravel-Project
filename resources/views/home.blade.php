@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
<<<<<<< HEAD

                    You are logged in!
=======
                    You are logged as {{ Auth::user()->role }}
                </div>
                <div class="panel-heading">Manage Permission</div>
                <div class="panel-body">
                    @if(checkPermission(['user','admin','arbiter']))
                    <a href="{{ url('permissions-all-users') }}"><button>Access All Users</button></a>
                    @endif
                    @if(checkPermission(['admin','arbiter']))
                    <a href="{{ url('permissions-admin-arbiter') }}"><button>Access Admin and arbiter</button></a>
                    @endif
                    @if(checkPermission(['arbiter']))
                    <a href="{{ url('permissions-arbiter') }}"><button>Access Only arbiter</button></a>
                    @endif
>>>>>>> origin/master
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
