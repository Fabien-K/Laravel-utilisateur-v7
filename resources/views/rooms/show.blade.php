@extends('layouts.app')
@section('content')
  <h2>{{ $room->title}}</h2>
  <ul>
  @forelse ($messages as $message )
    <li>{{ $message->body}}</li>
  @empty
    <p>Vous n'avez pas de message</p>
  @endforelse
  </ul>
@endsection