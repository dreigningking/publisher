<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('storepost')}}" method="post">@csrf
        <label>Website ID</label>
        <input type="text" name="website_id">
        <label>Post Title</label>
        <input type="text" name="title">
        <label>Post Description</label>
        <textarea name="description"></textarea>
        <button type="submit">Save</button>
    </form>
</body>
</html>