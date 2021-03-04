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
                            <input type="text" class="form-control" id="name" name="name" placeholder="name" 
                            value="{{ old('name', $role->name) }}" readonly>
                            </div>
                            <div class="form-group col-md-6">
                            <label for="slug">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" 
                            value="{{ old('slug', $role->slug) }}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Descripcion</label>
                            <textarea name="description" id="description" cols="3" rows="4"class="form-control"placeholder="1234 Main St">{{ old('description', $role->description) }}</textarea>
                            
                        </div>
                        <fieldset disabled class="form-group">
                            <div class="row">
                            <div class="col-sm-10">
                                <div class="form-check">
                                <input disabled} class="form-check-input" type="radio" name="full-access" id="fullaccessyes" value="yes" 
                                @if($role['full-access']=="yes")
                                checked
                                @elseif (old('full-access')=="yes")
                                checked
                                    
                                @endif
                                > 
                                <label class="form-check-label" for="fullaccessyes">
                                    Si
                                </label>
                                </div>
                                <div class="form-check">
                                <input disabled class="form-check-input" type="radio" name="full-access" id="fullaccessno" value="no"
                                @if ($role['full-access']=="no")
                                checked
                                @elseif (old('full-access')=="no")
                                checked
                             
                                @endif
                                 >
                                <label class="form-check-label" for="fullaccessno">
                                    No
                                </label>
                                </div>
                            
                            </div>
                            </div>
                        </fieldset>

                        <h3>Lisa de permisos</h3>
                        @foreach($permissions as $permission)

                        <div class="form-group">
                            <div class="form-check">
                            <input disabled class="form-check-input" 
                            type="checkbox" 
                            id="permission_{{ $permission->id }}" 
                            value="{{ $permission->id }}"
                            name="permission[]"
                            @if(is_array(old('permission')) && in_array("$permission->id", old('permission')))
                                checked
                                @elseif(is_array($array_permission_role) && in_array("$permission->id", $array_permission_role))
                                checked
                            @endif
                            >
                                    <label class="form-check-label" for="permission_{{ $permission->id }}">
                                        {{ $permission->id }}

                                        {{ $permission->name  }} <em>
                                        {{ $permission->description }}</em>
                                </label>
                            </div>
                        </div>

                        @endforeach

                        <a href="{{ route('role.index')}}" class="btn btn-danger">cancelar</a>
                        <a href="{{ route('role.edit' , $role->id)}}" class="btn btn-success float-right">Editar</a>
 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
