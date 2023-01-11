<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>upload krdo</title>
</head>
<body>
    <div class="container">
        <form action="#" method="post" enctype="multipart/form-data">

            {{csrf_field()}}
            <div class="my-1">
                <label for="formFileLg" class="form-label">Large file input example</label>
                <input class="form-control form-control-lg" id="mycsv" name="mycsv" type="file">
                <input class="btn btn-primary my-1" type="submit" value="Submit">
              </div>
        </form>
    </div>
</body>
</html>