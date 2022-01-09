<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Conecta IPDA - Entrar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/globals.css">
</head>
    <body class="login">
        {{-- Make a bootstrap form to login with a new account option and recovery --}}
        <div class="container vertical-center">
            <div class="row" style="justify-content: center;align-items:center;height:100%;">
                <div class="col-md-6">
                    {{-- div logo --}}
                    <div class="text-center logo-login">
                        <img src="/assets/img/logo_horizontal.png" alt="logo" width="200px">
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <form action={{route('site.auth.login')}} method="POST">
                                @csrf
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="password">Senha</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Senha">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Entrar</button>
                                </div>
                                {{-- forgote and register --}}
                                <div class="form-group details">
                                    <a href="{{route('site.auth.registrar')}}">Cadastrar</a>
                                    <a href="/recovery">Esqueci minha senha</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>
