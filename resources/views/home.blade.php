<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', $title)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style type="text/css">
        @import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);

        body {
            margin: 0;
            height: 100vh;
            font-size: .9rem;
            font-weight: 400;
            line-height: 1.6;
            color: #212529;
            text-align: left;
            background-color: #f5f8fa;
        }

        .navbar-laravel {
            box-shadow: 0 2px 4px rgba(0, 0, 0, .04);
        }

        .navbar-brand,
        .nav-link,
        .my-form,
        .login-form {
            font-family: Raleway, sans-serif;
        }

        .my-form {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }

        .my-form .row {
            margin-left: 0;
            margin-right: 0;
        }

        .login-form {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }

        .login-form .row {
            margin-left: 0;
            margin-right: 0;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
</head>

<body>
    @include('layouts.partials.nav')

    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-5 mt-5">
                <p style="text-align: justify;">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Obcaecati, amet quia! Autem ex tempora
                    ipsum fuga quo, ipsa vitae fugiat perferendis sequi, voluptas totam exercitationem neque inventore
                    minima magni harum numquam distinctio eius iure! Ad laborum, accusantium optio fugit quas libero
                    ipsam blanditiis nostrum laboriosam quasi! Debitis, ducimus. Vel, necessitatibus?
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea reiciendis recusandae iusto voluptatibus
                    tempora necessitatibus praesentium optio eligendi, id possimus atque. Quis dolor eius itaque quos
                    voluptatem, aut doloremque corrupti officia non ea ex quae!
                </p>
            </div>

            <div class="col-lg-5 offset-lg-2 mt-5">
                <img src="{{ asset('Assets/img/1.jpg') }}" alt="img" class="w-100">
            </div>
        </div>

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
