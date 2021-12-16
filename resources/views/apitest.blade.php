@extends('master')
@section('contents')
<style>


</style>




<div class="container-fluid mb-5" style="margin-bottom: 150px !important">
    <div class="row mr-4">

        <p>Number #1:</p>
        {{ $topTree[0] }}

        <p>Number #2:</p>
        {{ $topTree[1] }}

        <p>Number #3:</p>
        {{ $topTree[2] }}

    </div>
</div>

@stop