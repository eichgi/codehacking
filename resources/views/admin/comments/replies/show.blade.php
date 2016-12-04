{{--
@extends('layouts.admin')

@section('content')


    @if($comment)
        <h1>Comments</h1>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Content</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$comment->id}}</td>
                <td>{{$comment->author}}</td>
                <td>{{$comment->email}}</td>
                <td>{{$comment->body}}</td>
                <td><a href="{{route('home.post', $comment->post->id)}}">View Post</a></td>
                <td>
                    @if($comment->is_active == 1)
                        {!! Form::open(['method' => 'PATCH', 'action' => ['PostCommentsController@update', $comment->id]]) !!}

                        <input type="hidden" name="is_active" value="0">
                        <div class="form-group">
                            {!! Form::submit('Un-approve', ['class'=>'btn btn-danger']) !!}
                        </div>
                        {!! Form::close() !!}
                    @else
                        {!! Form::open(['method' => 'PATCH', 'action' => ['PostCommentsController@update', $comment->id]]) !!}

                        <input type="hidden" name="is_active" value="1">
                        <div class="form-group">
                            {!! Form::submit('Approve', ['class'=>'btn btn-success']) !!}
                        </div>
                        {!! Form::close() !!}
                    @endif
                </td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'action' => ['PostCommentsController@destroy', $comment->id]]) !!}
                    <div class="form-group">
                        {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            </tbody>
        </table>
    @else
        <h1 class="text-center">No Comments</h1>
    @endif
@stop--}}

@extends('layouts.admin')




@section('content')





    @if(count($replies) > 0)

        <h1>Comments</h1>


        <table class="table">
            <thead>
            <tr>
                <th>id</th>
                <th>Autho</th>
                <th>Email</th>
                <th>Body</th>
            </tr>
            </thead>
            <tbody>

            @foreach($replies as $reply)


                <tr>
                    <td>{{$reply->id}}</td>
                    <td>{{$reply->author}}</td>
                    <td>{{$reply->email}}</td>
                    <td>{{$reply->body}}</td>
                    <td><a href="{{route('home.post',$reply->comment->post->id)}}">View Post</a></td>

                    <td>

                        @if($reply->is_active == 1)


                            {!! Form::open(['method'=>'PATCH', 'action'=> ['CommentRepliesController@update', $reply->id]]) !!}


                            <input type="hidden" name="is_active" value="0">


                            <div class="form-group">
                                {!! Form::submit('Un-approve', ['class'=>'btn btn-success']) !!}
                            </div>
                            {!! Form::close() !!}


                        @else


                            {!! Form::open(['method'=>'PATCH', 'action'=> ['CommentRepliesController@update', $reply->id]]) !!}


                            <input type="hidden" name="is_active" value="1">


                            <div class="form-group">
                                {!! Form::submit('Approve', ['class'=>'btn btn-info']) !!}
                            </div>
                            {!! Form::close() !!}




                        @endif


                    </td>

                    <td>


                        {!! Form::open(['method'=>'DELETE', 'action'=> ['CommentRepliesController@destroy', $reply->id]]) !!}


                        <div class="form-group">
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                        </div>
                        {!! Form::close() !!}


                    </td>


                </tr>


            @endforeach

            </tbody>
        </table>



    @else


        <h1 class="text-center">No replies</h1>



    @endif


@stop
