@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar negocio</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('bussiness.update', ['bussiness' => $bussiness])}}" enctype="multipart/form-data">
                    {{ method_field('PUT') }}
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">address</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="address" value="{{$bussiness->address}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">lat</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="lat" value="{{$bussiness->lat}}">

                                @error('descripcion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">longitud</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="lng" value="{{$bussiness->lng}}">

                                @error('descripcion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                     

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">descipcion</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="description" value="{{$bussiness->description}}">

                                @error('descripcion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">

                        <label for="category_id">
                            Categoría
                        </label>
                        <select class="form-control" name="category_id">
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('category_id'))
                                    <div class="alert alert-danger" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <div class="d-flex align-items-center justify-content-start">
                                        <i class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                                        <span>Campo requerido</span>
                                    </div><!-- d-flex -->
                                    </div>
                                    @endif
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
