@extends('layouts.site')
@section('content')
<div class="container-fluid">
    <div class="row">
        {{-- make a filter panel for stores by category, state, city and address district--}}
        <div class="col-md-12">
            <div class="panel panel-primary panel-filter">
                <div class="panel-heading">
                    <h5 class="panel-title">Filtros</h5>
                </div>
                <form action="{{ route('site.home') }}" method="get" class="">
                    @csrf
                    <div class="panel-body">
                        <div class="row">
                            <div class="form-group col-md">
                                <select name="category" id="category" class="form-control-sm mr-sm-2">
                                    <option value="" selected>Selecionar Categoria</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if(!$user)
                                <div class="form-group col-md">
                                    <select name="state" id="state" class="form-control-sm">
                                        <option value="" selected>Selectionar Estado</option>
                                        @foreach($states as $state)
                                            <option
                                                value="{{ $state->id }}"
                                                {{app('request')->input('state') == $state->id ? 'selected' : ''}}}}
                                            >
                                                {{ $state->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md">
                                    <select name="city" id="city" class="form-control-sm" disabled>
                                        <option value="" selected disabled>Selectionar Cidade</option>
                                    </select>
                                </div>
                                <div class="form-group col-md">
                                    <select name="district" id="district" class="form-control-sm" disabled>
                                        <option value="" selected disabled>Selectionar Bairro</option>
                                    </select>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button type="submit" class="btn btn-primary btn-sm">Filtrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h5 class="panel-title">Lojas</h5>
                </div>
                <div class="panel-body">
                    <div class="row">
                        @foreach($stores as $store)
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $store->name }}</h5>
                                        <p class="card-text">{{ $store->description }}</p>
                                        <a href="{{ route('site.store.show', $store->id) }}" class="btn btn-primary">Ver Loja</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('assets/js/filter.js') }}"></script>
@endsection
