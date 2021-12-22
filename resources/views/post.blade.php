<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>posts</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="{{url('post.css')}}">
</head>
<body>
    <a href="{{url('logout')}}" class="btn btn-info btn-lg text-right" type="button">
        <span class="glyphicon glyphicon-log-out"></span> Log out
    </a>
<a href="{{url('posts/store')}}" class="btn btn-dark btn-lg btn-block">ADD NEW POST</a>
    <div class="container blog-page">
    <div class="row clearfix">
        <div class="col-md-12">
            @if(count($posts) < 1)
                <div class="h-100 row align-items-center" style="margin-top: 10%;">
                    <div class="col alert alert-success" role="alert" >
                        <h4 class="alert-heading">No Posts</h4>
                        <p>there is no posts for this user , please add new post from above BLUE Button</p>
                    </div>
                </div>
            @else
                @foreach ($posts as $post)
                    <div class="card single_post">
                        <div class="body">
                            <h3 class="m-t-0 m-b-5"><a href="#">{{ $post->title }}</a></h3>
                            <ul class="meta">
                                <li><a href="javascript:void(0);"><i class="zmdi zmdi-account col-blue"></i>Posted By: {{auth()->user()->name}}</a></li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="img-post m-b-15">
                                @foreach (explode( '|', $post->images) as $image)
                                    <div class="row text-center text-lg-start">
                                        <div class="col-lg-3 col-md-4 col-6">
                                        <a href="#" class="d-block mb-4 h-100">
                                            <img class="img-fluid img-thumbnail" src="{{url('/').'/'.$image}}" alt="photo">
                                        </a>
                                        </div>
                                    </div>
                                @endforeach
                                <p>{{$post->body}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
</body>
</html>
