@extends('users.layout')

@section('content')
  <div class="row">
    <div class="col-sm-6">
      <h1>User List</h1>
    </div>
    <div class="col-sm-6 text-right">
      <a href="{{ route('users.create')}}" class="btn btn-primary">Add User</a></td><br><br>
    </div>
  </div>

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br/>
  @elseif(session()->get('danger'))
    <div class="alert alert-danger">
      {{ session()->get('danger') }}
    </div><br/>
  @endif

  <table class="table table-striped border text-center">
    <thead>
      <tr>
        <td>#</td>
        <td>Name</td>
        <td>Email</td>
        <td>Password</td>
        <td>Manage Data</td>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $index => $user)
      <tr>
        <td>{{$index+1}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->password}}</td>
        <td>
          <div class="row justify-content-center">
            <a href="{{ route('users.edit', $user->id)}}" class="btn btn-success mr-1">Edit</a>
            <form action="{{ route('users.destroy', $user->id)}}" method="post">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger" type="submit">Delete</button>
            </form>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection
