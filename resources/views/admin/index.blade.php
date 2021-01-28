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
                @if ($user->isBanned())
                  <span class="badge badge-pill badge-dark">BAN</span>
                @else
                  @if ($user->isApproved() && !$user->isAdmin())      
                    <span class="badge badge-pill badge-success">Validé</span>   
                  @endif
                  @if ($user->isRefused() && !$user->isApproved())
                    <span class="badge badge-pill badge-danger">Refusé</span>
                  @endif
                  @if (!$user->isRefused() && !$user->isApproved() && $user->mailIsConfirmed())
                    <span class="badge badge-pill badge-warning">Attente de validation</span>        
                  @endif
                @endif
                 {{ $user->name}}</td>
                <td>{{ $user->email}}</td>
                <td style="text-align: end;">
                  @if (!$user->isBanned())
                    @if ($user->mailIsConfirmed())
                      @if ($user->isApproved()&& !$user->isAdmin())
                        <a href="/admin/refuse/{{ $user->id }}" class="btn btn-warning">Refuser</a>    
                      @endif
                      @if ($user->isRefused())
                        <a href="/admin/approved/{{ $user->id }}" class="btn btn-success">Valider</a>
                      @endif
                      @if (!$user->isApproved()&& !$user->isRefused())
                        <a href="/admin/refuse/{{ $user->id }}" class="btn btn-warning">Refuser</a>    
                        <a href="/admin/approved/{{ $user->id }}" class="btn btn-success">Valider</a>
                      @endif
                      @if (!$user->isAdmin())
                        <a href="/admin/ban/{{ $user->id }}" class="btn btn-danger">Ban</a>  
                      @endif                
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