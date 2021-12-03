@extends('layouts.master')
@section('content')
<h1>Here's a list of available tasks</h1>
    <table>
        <thead>
            <td>Name</td>
        </thead>
        <tbody>
            @each('deleteButton', $all, 'obj')
        </tbody>
    </table>
@endsection