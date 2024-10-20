<form action="{{ route('text.store') }}" method="POST">
  @csrf
  <textarea id="myeditorinstance" name="myeditorinstance"></textarea>
  <button type="submit">Odeslat</button>
</form>
