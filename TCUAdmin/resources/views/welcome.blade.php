@extends('layouts.master')

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
@if (!Auth::check())
    @include('includes.logearse')
@endif
</div>
@endSection
