@extends('layouts.app')
@section('content')
  <h2>Liste des rooms</h2>
  <ul>
  @forelse ($rooms as $room )
    <li>
      <a href="{{route('rooms.show', $room->slug)}}">{{ $room->title}}</a>     
    </li>
  @empty
    <p>Vous n'avez pas de room</p>
  @endforelse
  </ul>
@endsection