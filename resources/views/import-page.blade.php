<!DOCTYPE html>
<html>
<head>
    <title>Downloader</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <style>
        .card-header {
            text-align: center;
        }

        .btn-success {
            color: #fff;
            background-color: #9d28a7;
            border-color: #be0fd2;
            margin-left: 43%;
        }

        .error {
            color: red;
        }

        .container {
            margin-top: 14%;
        }

    </style>
</head>

<body>
<div class="container" >
    <div class="card bg-light mt-3">
        <h5 class="card-header">
            This application does nothing but uploads your Excel tables to the DataBase. <br/>
            Please Drag & Drop your files to the white rectangle, or just click at 'upload' button. <br/>
            Enjoy your experience :)
        </h5>
        <div class="card-body">
            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">IMPORT</button>
            </form>
            @if($errors->has('file'))
                <div class="error">{{ $errors->first('file') }}</div>
            @endif
            @if (Session::has('success'))
                <div class="alert alert-success">
                    <ul>
                        <li>{!! Session::get('success') !!}</li>
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>



</body>
</html>
