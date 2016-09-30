@extends('layout.dashboardMaster')
@section('content')
<div class="table-responsive">
    <table class="table table-bordered" style="margin-top: 10%;">
        <tr class="info">
            <td class="text-center"><h4>Caption</h4></td>
            <td class="text-center"><h4>Description</h4></td>
            <td class="text-center"><h4>Action</h4></td>
        </tr>
        <tr class="active">
            <td class="text-center">
                {{$article->caption}}
            </td>
            <td class="text-center">
                {!! $article->description !!}
            </td>
            <td class="text-center" style="word-spacing: 10px;">
                <a href="/article/edit/{{$article->id}}" class="text-left btn btn-success" title="Edit">Edit</a>
                <button value="{{$article->id}}" class="text-right btn btn-danger" title="Delete" id="delete">Delete</button>
            </td>
        </tr>
    </table>
</div>
@endsection
