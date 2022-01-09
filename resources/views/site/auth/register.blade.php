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
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action={{route('site.auth.register')}} method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nome:</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nome Completo">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="password">Senha:</label>
                                    <input type="password" minlength="8" name="password" id="password" class="form-control" placeholder="Senha">
                                </div>
                                {{-- form group with two dropbox with states and cities --}}
                                <div class="form-inline">
                                    <div class="form-group">
                                        <label for="state" style="display: block">Estado:</label>
                                        <select name="state" id="state" class="form-control">
                                            <option value="">Selecione</option>
                                            @foreach ($states as $state)
                                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="city" style="display: block">Cidade:</label>
                                        <select name="city_id" id="city" class="form-control" disabled>
                                            <option value="">Selecione</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                                </div>
                                {{-- forgote and register --}}
                                <div class="form-group details">
                                    <a href="{{route('site.auth.login')}}">Já tenho uma conta</a>
                                    <a href="/recovery">Esqueci minha senha</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </body>
    <script src="{{ asset('assets/js/filter.js') }}"></script>
</html>
