@extends('layout.master')
@section('content')
    @include('_partials.loginForm')
    {{@$_REQUEST['message']}}
@endsection
