<form action="{{ route('text.store') }}" method="POST">
  @csrf
  <textarea id="myeditorinstance" name="myeditorinstance"></textarea>
  <button type="submit" class="btn btn-outline-light" style="margin-top:1rem;">Odeslat</button>
</form>
