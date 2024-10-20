<h1>Upravit záznam</h1>

<form action="{{ route('text.update', $editoros->id) }}" method="POST">
    @csrf
    @method('PUT')

    <!-- Textarea naplněná existujícím obsahem záznamu -->
    <textarea id="myeditorinstance" name="myeditorinstance">{{ $record->editoros }}</textarea>

    <button type="submit">Uložit změny</button>
</form>