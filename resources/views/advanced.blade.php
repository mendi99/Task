@extends('layouts.master')
@section('content')
<form method="POST" action="/task/advanced">
    {{ csrf_field() }}
        <h1> Enter Details to search a task</h1>
        <div class="form-input">
            <label>Date</label> <input type="date" name="date">
            <label>User</label>
            <select name="usuario">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
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