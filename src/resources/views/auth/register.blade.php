<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '勤怠アプリ') }} - ユーザー登録</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f3f4f6;
        }

        .container {
            max-width: 500px;
            margin: 40px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
        }

        .form-input {
            width: 100%;
            padding: 8px;
            border: 1px solid #d1d5db;
            border-radius: 4px;
        }

        .form-input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.3);
        }

        .btn {
            padding: 10px 15px;
            background-color: #3b82f6;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #2563eb;
        }

        .error-message {
            color: #ef4444;
            font-size: 14px;
            margin-top: 5px;
        }

        .login-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #4b5563;
            text-decoration: underline;
        }

        .login-link:hover {
            color: #1f2937;
        }

        .form-footer {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>ユーザー登録</h1>
        </div>

        <!-- バリデーションエラーの表示 -->
        @if ($errors->any())
        <div class="error-container">
            <ul>
                @foreach ($errors->all() as $error)
                <li class="error-message">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- お名前 -->
            <div class="form-group">
                <label for="name" class="form-label">お名前</label>
                <input id="name" class="form-input" type="text" name="name" value="{{ old('name') }}" required autofocus>
                @error('name')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <!-- メールアドレス -->
            <div class="form-group">
                <label for="email" class="form-label">メールアドレス</label>
                <input id="email" class="form-input" type="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <!-- パスワード -->
            <div class="form-group">
                <label for="password" class="form-label">パスワード</label>
                <input id="password" class="form-input" type="password" name="password" required autocomplete="new-password">
                @error('password')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <!-- 確認用パスワード -->
            <div class="form-group">
                <label for="password_confirmation" class="form-label">確認用パスワード</label>
                <input id="password_confirmation" class="form-input" type="password" name="password_confirmation" required>
                @error('password_confirmation')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-footer">
                <a class="login-link" href="{{ route('login') }}">
                    既にアカウントをお持ちの方
                </a>
                <button type="submit" class="btn">
                    登録する
                </button>
            </div>
        </form>
    </div>
</body>

</html>