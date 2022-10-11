<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link rel="shortcut icon" href="https://dashboard.payriff.com/assets/images/favicon.svg" type="image/x-icon">
    <title>Success</title>
    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            font-size: 62.5%;
            font-weight: 500;
            font-family: 'Poppins';
            line-height: 1;
        }
        @media only screen and (max-width: 1500px) {
            html {
                font-size: 55%;
            }
        }

        body {
            padding-top: 5rem;
            padding-bottom: 5rem;
            max-width: 56rem;
            margin: 0 auto;
            text-align: center;
            background: #e5e5e5;
        }

        main {
            max-width: 60rem;
            background: #ffffff;
            border-radius: 2rem;
            padding: 7rem;
            margin-top: 6rem;
        }

        .notification-image {
            margin-top: 3rem;
        }

        .title {
            font-weight: 600;
            font-size: 2rem;
            line-height: 4.5rem;
            color: #000000;
            margin: 5rem 0 3rem 0;
        }
        .description {
            font-size: 1.6rem;
            line-height: 2.4rem;
            color: #9a9a9a;
            margin-top: 0.7rem;
        }
        .logo {
            width:120px;
            height:auto;
        }
        .btn-primary {
            background-color: #4dbdc6;
            padding: 2rem 2.5rem;
            border-radius: 1.5rem;
            color: #fff;
            font-size: 2.1rem;
            border: none;
            margin-top: 6rem;
            width: 100%;
        }
        @media only screen and (max-width: 768px) {
            html {
                font-size: 50%;
            }
            body {
                padding: 5rem 2rem;
            }
            main {
                padding: 4rem;
                margin-top: 3rem;
            }

            .title {
                margin-top: 4rem;
            }
        }
    </style>
</head>
<body>
<header>
    <a href="{{ route('frontend.home') }}">
        <img class="img-fluid logo" src="{{ asset('/frontend/images/logos/logo-shark.png') }}" alt="logo">
    </a>
</header>
<main>
    <img class="notification-image" src="{{ asset('/frontend/images/icons/ok.svg') }}" alt="image">
    <div class="title">Sifarişiniz uğurla qəbul olundu.</div>
    <a href="{{ route('frontend.home') }}" class="btn btn-primary">Sayta geri dön</a>
</main>

</body>
</html>
