@extends('Altamrp::layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Ver rol') }}</div>

                
                <div class="card-body">
                    @include('Altamrp::custom.message')
                    
                    <form>
                     @csrf
                     @method('PUT')
                     <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="name">Nombre</label>
                        <input disabled type="text" class="form-control" id="name" name="name" placeholder="name" 
                        value="{{ old('name', $user->name) }}">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="email">email</label>
                        <input disabled type="text" class="form-control" id="email" name="email" placeholder="email" 
                        value="{{ old('email', $user->email) }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="role">Roles</label>
                                <select disabled class="form-control" name="role" id="role">
                                    @foreach ($roles as $role)
                                    <option value="{{ $role->name }}"
                                        @isset($user->roles[0]->name)
                                            @if ($role->name ==$user->roles[0]->name)
                                                selected
                                            @endif
                                            
                                        @endisset
                                        >{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            
                         </div>
                            
                    </div>
               
                        <a href="{{ route('user.index')}}" class="btn btn-danger">cancelar</a>
                        <a href="{{ route('user.edit' , $user->id)}}" class="btn btn-success float-right">Editar</a>
 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
