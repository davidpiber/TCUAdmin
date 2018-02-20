@extends('layouts.master')

@section('content')
<div class="row formulario">
@if (!Auth::check())
    @include('includes.logearse')
@endif
</div>
@endSection
