<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Image to Resize and Format</title>
</head>
<body>
<form action="{{route('form.send')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image" required>
    <button type="submit">Resize</button>
</form>
<hr>
@foreach($galleries as $key => $gallery)
    <img src="{{asset($gallery->path)}}" alt="image {{$key}}">
@endforeach
</body>
</html>
