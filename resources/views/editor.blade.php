<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WYSIWYG Editor</title>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#editor',
            plugins: 'lists link image table code',
            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | link image | code',
        });
    </script>
</head>
<body>
    <h1>WYSIWYG Editor</h1>
    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif
    <form action="{{ route('editor.save') }}" method="POST">
        @csrf
        <textarea id="editor" name="content"></textarea>
        <button type="submit">Save</button>
    </form>
</body>
</html>
