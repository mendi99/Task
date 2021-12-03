@extends('layouts.master')
@section('content')
<form method="POST" action="/task/create">
    {{ csrf_field() }}
        <h1> Enter Details to create a task</h1>
        <div class="form-input">
            <label>Name</label> <input type="text" name="name">
        </div>
        <select name="usuario">
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select><br><br><br>
        @if(isset($error))
            <h1>{{$error}}</h1>
        @endif
        <button type="submit">Submit</button>
</form>
@endsection