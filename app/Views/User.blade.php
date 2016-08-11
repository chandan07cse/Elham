@extends('layout.master')
@section('content')
@include('_partials.UserCreate')
    {{@$_REQUEST['message']}}
@endsection