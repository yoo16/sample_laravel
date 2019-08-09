@extends('layout')

@section('content')

@include('components.error')

<form method="post" action="{{ url('/user/update', ['id' => $user->id])}}">
  {{ csrf_field() }}

  <table class="table">
    <tr>
      <th>Name</th>
      <td><input id="name" class="form-control col-6" type="text" name="name" value="{{ $user->name }}"></td>
    </tr>
    <tr>
      <th>Email</th>
      <td><input id="email" class="form-control col-6" type="text" name="email" value="{{ $user->email }}"></td>
    </tr>
  </table>

  <input class="btn btn-outline-primary" type="submit" name="submit" value="Update">
  <a class="btn btn-outline-primary" href="{{ action('UserController@index') }}">Back</a>
</form>
<form method="post" action="{{ url('/user/destroy', ['id' => $user->id])}}">
  {{ csrf_field() }}

  <input class="btn btn-outline-primary" type="submit" name="submit" value="Delete">
</form>
@stop