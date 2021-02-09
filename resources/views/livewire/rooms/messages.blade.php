<div>
    <ul>
    @forelse ($messages as $message )
      <li>{{ $message->body}}</li>
    @empty
      <p>Vous n'avez pas de message</p>
    @endforelse
  </ul>
</div>
