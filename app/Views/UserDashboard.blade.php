@extends('layout.dashboardMaster')
@section('content')
        <div class="container">
        <h4> Welcome {{\Elham\Controller\AuthController::userName()}}</h4><p></p>
                <legend>Your Articles</legend>
                {{\Elham\Controller\BaseController::getFlash('deleteMsg')}}
                <ul class="list-group">
                @foreach($users->articles as $article)
                        <li class="list-group-item"><a href="/articles/{{$article->id}}" class="list-group-item list-group-item-action list-group-item-info left">{{$article->caption}}</a></li>
                @endforeach
                </ul>
        </div>
@endsection
