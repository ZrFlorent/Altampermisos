@extends('Altamrp::layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Lista de roles') }}</div>

                <div class="card-body">
                    @can('haveaccess', 'role.create')
                        <a href=" {{ route('role.create')}} " class="btn btn-primary float-right">Crear</a>
                    @endcan



                    @include('Altamrp::custom.message')

      
                        
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Slug</th>
                                <th>Descripcion</th>
                                <th>Full-access</th>
                                <th colspan="3"></th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $rol)
                                <tr>
                                    <td>{{ $rol->id }}</td>
                                   
                                    <td>{{ $rol->name }} </td>
                                    <td>{{ $rol->slug }} </td>
                                    <td>{{ $rol->description }} </td>
                                    <td>{{ $rol['full-access'] }} </td>

                                    <td>
                                        @can('haveaccess', 'role.show')
                                          <a class="btn btn-info" href="{{ route('role.show', $rol->id) }}">Ver</a> 
                                        @endcan
                                    </td>
                                    <td>
                                        @can('haveaccess', 'role.edit')
                                        <a class="btn btn-success" href="{{ route('role.edit', $rol->id) }}">Editar</a> 
                                        @endcan
                                    </td>
                                    <td>
                                        @can('haveaccess', 'role.destroy')
                                        <form action="{{ route('role.destroy', $rol->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button  class="btn btn-danger ">Eliminar</button>
                                        </form>
                                        @endcan
                                    </td>
                                   


                                </tr>

                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
