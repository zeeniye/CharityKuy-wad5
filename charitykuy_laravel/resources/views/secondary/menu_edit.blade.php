@extends('layouts.app', ['title' => 'Update Donasi'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h3>Update Donasi</h3>
    </div>
    <div class="row pt-4 justify-content-center">
        <div class="col-md-auto">
            <div class="card rounded-lg" style="width:45em; box-shadow: rgba(0, 0, 0, 0.8) 0px 7px 10px, inset rgba(0, 0, 0, 0.15) 0px 0px 3px;">
                <a type="button" class="close text-right pr-3 pt-2" aria-label="Close" style="color: red" href="{{ route('menus.detail', $item) }}">
                    <span aria-hidden="true">&times;</span>
                </a>
                <div class="card-body">
                    <form action="{{ route('menus.update', $item) }}" method="post" enctype="multipart/form-data">
                        @csrf @method('patch')
                        @include('layouts.form_control')
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- {{ dd($products[0]->img_path) }} --}}
</div>
@stop