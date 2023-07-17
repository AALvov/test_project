<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Document</title>
    <style>
        html {
            background-color: #214c84;
            background-blend-mode: overlay;
            display: flex;
            align-items: center;
            justify-content: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 100%;
        }

        body {
            background-color: transparent;
        }

        .registration-cssave {
            padding: 50px 0;
        }

        .registration-cssave form {
            max-width: 800px;
            padding: 50px 70px;
            border-radius: 10px;
            box-shadow: 4px 4px 15px rgba(0, 0, 0, 0.2);
            background-color: #fff;
        }

        .registration-cssave form h3 {
            font-weight: bold;
            margin-bottom: 30px;
        }

        .registration-cssave .item {
            border-radius: 10px;
            margin-bottom: 25px;
            padding: 10px 20px;
        }

        .registration-cssave .create-account {
            border-radius: 30px;
            padding: 10px 20px;
            font-size: 18px;
            font-weight: bold;
            background-color: #3f93ff;
            border: none;
            color: white;
            margin-top: 20px;
        }

        @media (max-width: 576px) {
            .registration-cssave form {
                padding: 50px 20px;
            }
        }

    </style>
</head>
<body>

<div class="registration-cssave">
    @if ($errors->any())
        <div>
            <div>Что-то пошло не так!</div>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{route('login')}}">
        @csrf
        <h3 class="text-center">Форма входа</h3>
        <div class="form-group">
            <input class="form-control item" type="email" name="email" id="email" placeholder="Email"
                   value="{{old('email')}}" required>
        </div>
        <div class="form-group">
            <input class="form-control item" type="password" name="password" id="password" value="{{old('password')}}"
                   placeholder="Пароль" required>
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block create-account" type="submit">Вход в аккаунт</button>
        </div>
    </form>
</div>

</body>
</html>



