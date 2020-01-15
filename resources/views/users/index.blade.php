@extends('users.layout')

@section('content')
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br/>
  @endif
  <h1>User List</h1>
  <a href="{{ route('users.create')}}" class="btn btn-primary">Add User</a></td><br><br>
  <table class="table table-striped border text-center">
    <thead>
        <tr>
          <td>Number</td>
          <td>Name</td>
          <td>Email</td>
          <td>Password</td>
          <td colspan="2">Manage Data</td>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->password}}</td>
            <td></td>
            <td></td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection
