<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Send Cv Form</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
        crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
</head>

<body>
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">

            <div class="cv-form">
                <div class="container">
                    <div class="title-section">
                        <h1>Job Offer</h1>
                        <p>If you want to join our team please send your CV.</p>
                    </div>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            {!! implode('', $errors->all('<div>:message</div>')) !!}
                        </div>
                    @endif
                    <div class="cv-fields">
                        <div class="pl-5 pr-5">
                            <form action="{{ route('cvsend') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Your Name</label>
                                    <div class="inner-addon left-addon">
                                        <i class="fas fa-user"></i>
                                        <input type="text" name="name" id="name" required placeholder="Example: John Doe" class="form-control" value="{{ old('name') }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="file">Your CV (doc, docx, pdf)</label>
                                    <div class="inner-addon left-addon">
                                        <i class="fas fa-folder-open"></i>
                                        <input type="file" name="cv_path" id="file" required class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Your Email Address</label>
                                    <div class="inner-addon left-addon">
                                        <i class="fas fa-envelope"></i>
                                        <input type="email" name="email" id="email" required placeholder="example: office@example.com" value="{{ old('email') }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="message">Your Message</label>
                                    <div class="inner-addon left-addon">
                                        <i class="fas fa-comment-alt"></i>
                                        <textarea name="message" id="message" class="form-control" placeholder="Example: I'd like to say Hello World" cols="20" rows="4">{{ old('message') }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary w-100">Submit your CV</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>