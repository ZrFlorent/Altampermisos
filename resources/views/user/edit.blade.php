@extends('Altamrp::layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Usuario') }}</div>

                
                <div class="card-body">
                    @include('Altamrp::custom.message')
                    
                    <form action="{{ route('user.update', $user->id)}}" method="POST">
                     @csrf
                     @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Nombre</label>
                                <input type="text" 
                                 class="form-control"
                                 id="name" 
                                 name="name" 
                                 placeholder="name" 
                                 value="{{ old('name', $user->name) }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="email">email</label>
                                <input type="text" 
                                 class="form-control" 
                                 id="email" 
                                 name="email" 
                                 placeholder="email" 
                                 value="{{ old('email', $user->email) }}" >
                            </div>

                            <div class="form-group col-md-6">
                                <label for="role">Roles</label>

                                    <select class="form-control" name="roles" id="roles">
                                        @foreach ($roles as $role)

                                        <option value="{{ $role->id }}"

                                            @isset($user->roles[0]->name)

                                                @if ($role->name==$user->roles[0]->name)
                                                    selected
                                                @endif
                                                
                                            @endisset
                                            >{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                
                             </div>
                                
                        </div>
                   

                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
