<!doctype html>
    <html lang="{{ app()->getLocale() }}">
    <head>
        <title>Task</title>
    </head>
    <style>
        body{
            text-align: center;
            justify-content: center;
        }
    </style>
    <body>
        <a href="/" style="text-decoration: none"><h1>TASKS</h1></a>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <a href="/task/show" style="text-decoration: none">Task List</a><a> / </a>
                <a href="/task/create" style="text-decoration: none">Create Task</a><a> / </a>
                <a href="/task/search" style="text-decoration: none">Search Task</a><a> / </a>
                <a href="/task/advanced" style="text-decoration: none">Advanced Search Task</a><br>
                <a href="/user/create" style="text-decoration: none">Create User</a>
            @section('content')
                <p>This part will be deleted</p>
            @show
            </div>
        </div>
    </body>
    </html>
