@extends('template')

@section('title', 'Profile')

@section('konten')

    <style>
        body {
            font-family: "Raleway", Arial, Helvetica, sans-serif;
            font-weight: bold;
            font-size: 16px;
            background: #198653;
            min-height: 100vh;
            align-items: center;
            justify-content: center;
            display: flex;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS",
                sans-serif;
        }

        .container {
            width: 100%;
            display: flex;
            max-width: 850px;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0, 1);
        }

        .login {
            width: 400px;
        }

        form {
            width: 250px;
            margin: 60px auto;
        }

        h1 {
            margin: 20px;
            text-align: center;
            font-weight: bolder;
            text-transform: uppercase;
        }

        hr {
            border-top: 2px solid #198653;
        }

        p {
            text-align: center;
            margin: 10px;
        }

        .right img {
            width: 450px;
            height: 100%;
            border-top-right-radius: 15px;
            border-bottom-right-radius: 15px;
        }

        form label {
            display: block;
            font-size: 16px;
            font-weight: 600;
            padding: 5px;
        }

        input {
            width: 100%;
            margin: 2px;
            border: none;
            outline: none;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid gray;
        }

        button {
            border: none;
            outline: none;
            padding: 8px;
            width: 252px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
            border-radius: 5px;
            background: #198653;
        }

        button:hover {
            background: rgba(214, 86, 64, 1);
        }

        @media (max-width: 880px) {
            .container {
                width: 100%;
                max-width: 750px;
                margin-left: 20px;
                margin-right: 20px;
            }

            form {
                width: 300px;
                margin: 20 auto;
            }

            .login {
                width: 400px;
                padding: 20px;
            }

            button {
                width: 100%;
            }

            .right img {
                width: 100%;
                height: 100%;
            }
        }
    </style>

    <div class="container">
        <div class="login">
            <h1>Login</h1>
            <hr>
            <p>Masuk ke lembaga sertifikasi organik</p>
            <form id="loginForm" name="loginForm">
                <label for="usernamae">Username</label>
                <input type="text" id="username" name="username" placeholder="username">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="password">
                <div id="error-message" style="color: red;"></div>
                <button type="submit" class="tombol-login">
                    <span id="spinner" class="spinner-border spinner-border-sm" style="display: none;"
                        aria-hidden="true"></span>
                    <span id="textSpinner">Login</span>
                </button>
            </form>
        </div>
        <div class="right">
            <img src="{{ asset('storage/images/webmaster/logo.png') }}" alt="">
        </div>
    </div>

@endsection

@section('script')

    <script>
        var SITEURL = '{{ URL::to('') }}';
        $(document).ready(function() {

            $('#loginForm').submit(function(e) {
                e.preventDefault();
                $('#error-message').text('')
                $('#spinner').show();
                $('#textSpinner').hide();

                var formData = new FormData(this);

                $.ajax({
                    type: 'POST',
                    url: "backoffice/login",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        // Sembunyikan spinner
                        $('#spinner').hide();
                        $('#textSpinner').show();

                        // console.log(data);
                        window.location.href = data.redirect;
                    },
                    error: function(xhr) {
                        // Sembunyikan spinner
                        $('#spinner').hide();
                        $('#textSpinner').show();

                        console.log('Error:', xhr.responseJSON);
                        // Tampilkan pesan kesalahan
                        var errors = xhr.responseJSON.errors;
                        if (errors && errors.username) {
                            $('#error-message').text(errors.username[0]);
                        } else {
                            $('#error-message').text('Terjadi kesalahan saat login.');
                        }
                    }
                });
            });
        });
    </script>
@endsection
