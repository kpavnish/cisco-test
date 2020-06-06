@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">RouterProperty {{ $routerproperty->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/router-properties') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/router-properties/' . $routerproperty->id . '/edit') }}" title="Edit RouterProperty"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/routerproperties' . '/' . $routerproperty->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete RouterProperty" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $routerproperty->id }}</td>
                                    </tr>
                                    <tr><th> Sapid </th><td> {{ $routerproperty->sapid }} </td></tr><tr><th> Hostname </th><td> {{ $routerproperty->host_name }} </td></tr><tr><th> Loopback </th><td> {{ $routerproperty->loop_back }} </td></tr>
                                    <tr><th>Mac Address </th><td> {{ $routerproperty->mac_address }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
