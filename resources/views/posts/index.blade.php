 @extends('layouts.app')

 @section('content')
    <h1>Posts</h1>
    @if (count($posts) > 0)
        @foreach ($posts as $post)
            <ul class="list-group">
                <li class="list-group-item">
                    <div class="">
                        <h3> <a href="/posts/{{$post->id}}">{{$post->title}}</a> </h3>
                    </div>
                    <small>written on {{$post->created_at}} by {{$post->user['name']}}</small>
                </li>
                <div class="mb-4"></div>
            </ul>
        @endforeach
        {{$posts->links()}}
    @else
        <p>No posts found</p>
    @endif
 @endsection