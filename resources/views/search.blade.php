@extends('layouts.master')
@section('content')
<form method="POST" action="/task/search">
    {{ csrf_field() }}
        <h1> Enter Details to search a task</h1>
        <div class="form-input">
            <label>Name</label> <input type="text" name="name">
        </div>
        <button type="submit">Submit</button>
        @if(isset($error))
            <h1>{{$error}}</h1>
        @endif
        @if(isset($resultado))
            @foreach($resultado as $result)
                <p>{{$result->name}}</p>
            @endforeach
        @endif
</form>
@endsection