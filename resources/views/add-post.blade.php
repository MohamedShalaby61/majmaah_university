<!DOCTYPE html>
<html lang="en">
<head>
    <title>add post</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <style>
        .require {
            color: #666;
        }
        label small {
            color: #999;
            font-weight: normal;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
            <div class="col-md-8 col-md-offset-2">

                <h1>Create post</h1>

                <form action="{{url('posts/store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title <span class="require">*</span></label>
                        <input type="text" class="form-control" name="title" />
                    </div>

                    <div class="form-group">
                        <label for="body">body</label>
                        <textarea rows="5" class="form-control" name="body" ></textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlFile1">Images</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="images[]" accept="image/*" multiple>
                    </div>

                    <div class="form-group">
                        <p><span class="require">*</span> - required fields</p>
                    </div>

                    <div class="form-group">
                        <button type="submit" value="submit" class="btn btn-primary">
                            Create
                        </button>
                        <a href="{{url('posts')}}" class="btn btn-default">
                            Cancel
                        </a>
                    </div>

                </form>
            </div>

        </div>
    </div>
</body>
</html>
