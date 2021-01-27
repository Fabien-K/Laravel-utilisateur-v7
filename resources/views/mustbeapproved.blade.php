@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            {{__('you must be approved')}}
          </div>
          <div class='card-body'>
            {{__('l\'administrateur doit valider votre compte')}}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection