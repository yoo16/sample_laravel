@extends('layout')

@section('content')

<form method="post" action="{{ url('/user/store')}}">
  {{ csrf_field() }}

  <table class="table">
    <tr>
      <th>Name</th>
      <td><input id="name" type="text" name="name" value=""></td>
    </tr>
    <tr>
      <th>Email</th>
      <td><input id="email" type="text" name="email" value=""></td>
    </tr>
    <tr>
      <th>Password</th>
      <td><input id="password" type="password" name="password" value=""></td>
    </tr>
  </table>
  <input class="btn btn-outline-primary" type="submit" name="submit" value="Update">
  <a class="btn btn-outline-primary" href="{{ action('UserController@index') }}">Back</a>

</form>
@stop