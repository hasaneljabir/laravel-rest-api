@extends('users.layout')

@section('content')
<div class="card uper">
  <div class="card-header">
    Form Add User
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br/>
    @endif
      <form method="post" action="{{ route('users.store') }}">
        @csrf
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email"/>
          </div>
          <div class="form-group">
            <label>Address</label>
            <input type="text" class="form-control" name="address"/>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password"/>
          </div>
          <button type="submit" class="btn btn-primary">Add User</button>
      </form>
  </div>
</div>
@endsection
