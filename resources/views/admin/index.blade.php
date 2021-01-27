@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <table class="table table-striped">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ( $users as $user )
              <tr>
                <th scope='row'>{{$user->id}}</th>
                <td>{{ $user->name}}</td>
                <td>{{ $user->email}}</td>
              </tr>    
            @endforeach
          </tbody>
        </table>
        {{$users->links() }}
      </div>
    </div>
  </div>

@endsection