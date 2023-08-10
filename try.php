<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="testphp.php" method="post" enctype="multipart/form-data">
    <label for="formFile" class="form-label">Upload your qualification certificates and relevant documents</label>
                                      <input class="form-control" type="file" id="formFile" name="document[]" accept=".doc,.docx,.pdf,.epub,.odf" multiple required>
    <div>
    <button type="submit" class="btn btn-primary" name="submit">Sign Up</button>
    </div>
    </form>
</body>
</html>