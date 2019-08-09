@extends('layout')

@section('content')

<div>
  {{ $users->links() }}
</div>

<table class="table">
  <tr>
    <th><a class="btn btn-outline-primary" href="{{ action('UserController@create') }}">Add</a></th>
    <th>Name</th>
    <th>Email</th>
  </tr>
  @foreach($users as $user)
  <tr>
    <td><a class="btn btn-outline-primary" href="{{ action('UserController@edit', $user->id) }}">Edit</a></td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
  </tr>
  @endforeach
</table>

@stop