@extends('layouts.app')
@section('content')
<div class="container">
    <table class="table table-bordered table-striped">
        <thead>
        <th>#</th>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Télefono</th>
        <th>Acciones</th>
        </thead>
        <tbody>
        @foreach($user as $usuarios)
            <tr>
                <td>{{$usuarios->id}}</td>
                <td>{{$usuarios->name}}</td>
                <td>{{$usuarios->email}}</td>
                <td>{{$usuarios->phone}}</td>
                <td>
                    <form action="{{route('user.destroy',$usuarios->id)}}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <a href="{{route('user.perfil',$usuarios->id)}}"></a>
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>


@endsection
