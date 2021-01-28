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
                <td>
                @if ($user->isAdmin())
                  <span class="badge badge-pill badge-info">Admin</span>
                @endif

                @if (! $user->mailIsConfirmed())
                  <span class="badge badge-pill badge-secondary">Attente de confirmation</span>
                @endif
                
                @if ($user->isApproved() && !$user->isAdmin())      
                  <span class="badge badge-pill badge-success">Validé</span>   
                @endif

                @if ($user->isRefused() && !$user->isApproved())
                  <span class="badge badge-pill badge-danger">Supprimé</span>
                @endif
                @if (!$user->isRefused() && !$user->isApproved() && $user->mailIsConfirmed())
                  <span class="badge badge-pill badge-warning">Attente de validation</span>
                @endif
                 {{ $user->name}}</td>
                <td>{{ $user->email}}</td>
                <td style="text-align: end;">
                @if (!$user->isBanned())
                  @if ($user->mailIsConfirmed())
                    <a href="/admin/refuse/{{ $user->id }}" class="btn btn-warning">Refuser</a>
                    <a href="/admin/approved/{{ $user->id }}" class="btn btn-success">Valider</a>
                    <a href="/admin/ban/{{ $user->id }}" class="btn btn-danger">Ban</a>                  
                  @endif
                  
                      
                  @endif
                </td>
              </tr>    
            @endforeach
          </tbody>
        </table>
        {{$users->links() }}
      </div>
    </div>
  </div>

@endsection