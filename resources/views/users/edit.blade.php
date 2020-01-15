@extends('users.layout')

@section('content')
<div class="card uper">
  <div class="card-header">
    Edit User
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

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" value="{{ $user->name }}"/>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" value="{{ $user->email }}"/>
          </div>
          <div class="form-group">
            <label>Address</label>
            <input type="text" class="form-control" name="address" value="{{ $user->address }}" />
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="text" class="form-control" name="password" value="{{ $user->password }}"/>
          </div>
          <button type="submit" class="btn btn-primary">Update User</button>
        </div>
    </form>
  </div>
</div>
@endsection
