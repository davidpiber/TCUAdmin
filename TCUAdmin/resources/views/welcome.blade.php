@extends('layouts.master')

@section('title')
    TCU Admin
@endSection

@section('content')
@if(count($errors) > 0)
    <div class="row">
        <div class="col-md-6">
            <ul>
                @foreach($errors->all() as $error) 
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

<div class="row formulario">
    @include('includes.registro')
    @include('includes.logearse')
</div>
@endSection
