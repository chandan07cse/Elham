@extends('layout.master')
@section('content')
   <div class="table-responsive">
        <table class="table table-bordered" style="margin-top: 10%;">
            <tr class="info">
                <td class="text-center"><h4>Username</h4></td>
                <td class="text-center"><h4>Image</h4></td>
                <td class="text-center"><h4>Article Caption</h4></td>
            </tr>
            @foreach($users as $user)
            <tr class="active">
                <td class="text-center valign">{{$user['username']}}</td>
                <td class="text-center valign"><img src="images/{{$user['image']}}" width="100" height="100" /></td>
                <td class="text-center">
                    <div class="list-group">
                    @foreach($user['articles'] as $article)
                        <button value="{{$article['id']}}" class="list-group-item btn btn-success article">{{$article['caption']}}</button><br/>
                    @endforeach
                    </div>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection
