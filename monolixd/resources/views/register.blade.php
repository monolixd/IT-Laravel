<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{route('register.add')}}" method="POST">
        @csrf 
        <div>
            <input type="text" name = "name" placeholder="name">
        </div>
        <div>
            <input type="email" name = "email" placeholder="email">
        </div>
        <div>
            <input type="text" name = "password" placeholder="password">
        </div>
        <button type="submit"> Submit </button>

        @if (session('success'))
            <div class="alert alert-success">
                <li>{{session('success')}}</li>
            </div>
        @endif

    </form>
</body>
</html>