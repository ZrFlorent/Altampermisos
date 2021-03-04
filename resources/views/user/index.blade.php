@extends('Altamrp::layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Lista de usuarios') }}</div>

                <div class="card-body">

                    @include('Altamrp::custom.message')

      
                        
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>E-mail</th>
                                <th>Roles</th>

                                <th colspan="3"></th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                   
                                    <td>{{ $user->name }} </td>
                                    <td>{{ $user->email }} </td>
                                    <td>
                                        @isset($user->roles[0]->name)
                                            {{ $user->roles[0]->name }}
                                        @endisset
                                        </td>

                                    <td>
                                        @can('view', [$user,['user.show', 'userowner.show']])
                                        <a class="btn btn-info" href="{{ route('user.show', $user->id) }}">Ver</a> 
                                        @endcan
                                    </td>
                                    <td>
                                        @can('view', [$user,['user.edit', 'userowner.edit']])
                                        <a class="btn btn-success" href="{{ route('user.edit', $user->id) }}">Editar</a>
                                        @endcan 
                                    </td>
                                    <td>
                                        @can('haveaccess', 'user.destroy')
                                        <form action="{{ route('user.destroy', $user->id) }}" method="post">
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
