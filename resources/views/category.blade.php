@extends('layouts.blog-category')
@section('content')
    <section class="catagory-welcome-post-area section_padding_100">
        <div class="container">
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-12 col-md-4">
                        <!-- Gazette Welcome Post -->
                        <div class="gazette-welcome-post">
                            <!-- Post Tag -->
                            <div class="gazette-post-tag">
                                @foreach($post->categories as $postcategories)
                                    <a href="{{route('category.category', $postcategories->name)}}">{{$postcategories->name}}</a>
                                @endforeach
                            </div>
                            <h2 class="font-pt">{{Str::limit($post->title,20, '...')}}</h2>
                            <p class="gazette-post-date">{{$post->created_at->diffForHumans()}}</p>
                            <!-- Post Thumbnail -->
                            <div class="blog-post-thumbnail my-5">
                                <img class="img-fluid" src="{{asset($post->photo ? $post->photo->file : 'http://via.placeholder.com/400')}}" alt="post-thumb">
                            </div>
                            <!-- Post Excerpt -->
                            <p>{{Str::limit($post->body,200,'...')}}</p>
                            <!-- Reading More -->
                            <div class="post-continue-reading-share mt-30">
                                <div class="post-continue-btn">
                                    <a href="{{route('home.post', $post)}}" class="font-pt">Continue Reading <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                {{$posts->render()}}
            </div>

        </div>
    </section>
@endsection
