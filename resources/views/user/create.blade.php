@extends('layout')

@section('content')

@include('components.error')

<form method="post" action="{{ url('/user/store')}}">
  {{ csrf_field() }}

  <table class="table">
    <tr>
      <th>Name</th>
      <td><input id="name" class="form-control col-6" type="text" name="name" value="{{ old('name') }}"></td>
    </tr>
    <tr>
      <th>Email</th>
      <td><input id="email" class="form-control col-6" type="text" name="email" value="{{ old('email') }}"></td>
    </tr>
    <tr>
      <th>Password</th>
      <td><input id="password" class="form-control col-6" type="password" name="password" value=""></td>
    </tr>
  </table>
  <input class="btn btn-outline-primary" type="submit" name="submit" value="Update">
  <a class="btn btn-outline-primary" href="{{ action('UserController@index') }}">Back</a>

</form>
@stop