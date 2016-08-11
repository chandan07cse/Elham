@extends('layout.master')
@section('content')
@include('_partials.UserEdit')
{{@$_REQUEST['message']}}
@endsection