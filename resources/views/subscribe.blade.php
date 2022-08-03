<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('subscribe')}}" method="post">@csrf
        <label>Website ID</label>
        <input type="text" name="website_id">
        <label>User ID</label>
        <input type="text" name="user_id">
        <button type="submit">Save</button>
    </form>
</body>
</html>