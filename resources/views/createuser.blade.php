@extends('layouts.master')
@section('content')
<form method="POST" action="/user/create">
    {{ csrf_field() }}
        <h1> Enter Details to create a task</h1>
        <div class="form-input">
            <label>Name</label> <input type="text" name="name">
            <label>Last Name</label> <input type="text" name="lname">
            @if(isset($error))
                <h1>{{$error}}</h1>
            @endif
        </div><br><br><br>
        <button type="submit">Submit</button>
</form>
@endsection