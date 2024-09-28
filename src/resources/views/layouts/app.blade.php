<!DOCTYPE html>

<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form</title>

    <!-- css -->
    <link rel="stylesheet" href="css/sanitize.css">
    <link rel="stylesheet" href="css/common.css">
    @yield('css')

    <!-- webフォント -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gorditas:wght@400;700&family=Inika:wght@400;700&display=swap" rel="stylesheet">

    @livewireStyles
</head>

<body>
    <!-- ヘッダー -->
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="">FashionablyLate</a>
            <!-- ヘッダーのボタン -->
            @yield('header-button')
        </div>
    </header>

    <!-- メインコンテンツ -->
    <main>
        <!-- 各ページのコンテンツ -->
        @yield('content')
    </main>
</body>
</html>