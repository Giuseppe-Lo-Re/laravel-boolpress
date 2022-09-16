<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>
        Buongiorno,
    </h3>
    <h3>
        E' stato appena creato un nuovo post dal titolo 
        <a href="{{ route('admin.posts.show', ['post' => $new_post->id]) }}">
            {{ $new_post->title }}
        </a> 
    </h3>
</body>
</html>