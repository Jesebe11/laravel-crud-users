<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <!-- Styles -->
      
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-8-auto">

                    <div class="card border-0 shadow">
                        <h1>Ingrese un nuevo usuario</h1>
                        <div class="card-body">

                            @if ($errors->any())
                                    <div class="alert alert-danger">
                                            @foreach ($errors->all() as $error)
                                                -{{ $error }} <br>
                                            @endforeach
                                    </div>    
                            @endif

                        <form action="{{ route('users.store') }}" method="POST">
                            <div class="form-row">
                                    <div class="col-sm-3">
                                            <input type="text" name="name" class="form-control" placeholder="Nombre" value="{{ old('name') }}">

                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">

                                </div>
                                <div class="col-sm-3">
                                    <input type="password" name="password" class="form-control" placeholder="Contraseña">
                                </div>
                                <div class="col-auto">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </div>
                        
                            </div>
                        </div>
                        
                        </form>
                    </div>
                    <br>
                    <br>


                    <h2>Listado de usuarios</h2>



                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name}}</td>
                                    <td>{{ $user->email}}</td>
                                    <td>
                                        <form action="{{ route('user.destroy', $user) }}" method="POST">
                                            @method('DELETE')
                                            @csrf

                                            <input 
                                            type="submit" 
                                            value="Eliminar" 
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('¿Desea eliminar...?')">
                                        </form>

                                    </td>


                                </tr>
                                
                            @endforeach
                        </tbody>
                    </table>
                
                </div>
            </div>


        </div>
      
    </body>
</html>
