@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">User {{ $user->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/user') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/user/' . $user->id . '/edit') }}" title="Edit User"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('user' . '/' . $user->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete User" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $user->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $user->name }} </td></tr><tr><th> Email </th><td> {{ $user->email }} </td></tr><tr><th> Email Verified At </th><td> {{ $user->email_verified_at }} </td></tr><tr><th> Password </th><td> {{ $user->password }} </td></tr><tr><th> Remember Token </th><td> {{ $user->remember_token }} </td></tr><tr><th> Role </th><td> {{ $user->role }} </td></tr>
                                </tbody>
                            </table>
                            <hr>
                            @php
                            $vehicles = $user->vehicles()->where("brand","honda")->orderBy("year","desc")->get();
                            $count = $vehicles->count("id");
                            $sum = $vehicles->sum("mileage");
                            $average = $vehicles->average("mileage");
                            $min = $vehicles->min("mileage");
                            $max = $vehicles->max("mileage"); 
                            @endphp
                            <h2 class="pt-4">{{ $user->name }}'s Vehicles</h2>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Brand</th><th>Series</th><th>Color</th><th>Year</th><th>Mileage</th><th>User Id</th><th>User Email</th><th>User Role</th>
<th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($vehicles as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->Brand }}</td><td>{{ $item->Series }}</td><td>{{ $item->Color }}</td><td>{{ $item->Year }}</td><td>{{ $item->Mileage }}</td><td>{{ $item->user_id }}</td>
                                        <td>{{ isset($item->user->email) ? $item->user->email : ""}}</td>
                                        <td>{{ isset($item->user->role) ? $item->user->role : ""}}</td>

                                        <td>
                                            <a href="{{ url('/vehicles/' . $item->id) }}" title="View vehicle"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/vehicles/' . $item->id . '/edit') }}" title="Edit vehicle"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/vehicles' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete vehicle" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Brand</th><th>Series</th><th>Color</th><th>Year</th><th>Mileage</th><th>User Id</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($vehicles as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->Brand }}</td><td>{{ $item->Series }}</td><td>{{ $item->Color }}</td><td>{{ $item->Year }}</td><td>{{ $item->Mileage }}</td><td>{{ $item->user_id }}</td>
                                        <td>
                                            <a href="{{ url('/vehicles/' . $item->id) }}" title="View vehicle"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/vehicles/' . $item->id . '/edit') }}" title="Edit vehicle"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/vehicles' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete vehicle" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <div >จำนวนรถ : {{ $count }} </div>
<div >รวมระยะไมล์ : {{ $sum }} </div>
<div >ค่าเฉลี่ยระยะไมล์ : {{ $average }} </div>
<div >ค่าระยะไมล์น้อยสุด : {{ $min }} </div>
<div >ค่าระยะไมล์มากสุด : {{ $max }} </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
