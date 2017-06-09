<!DOCTYPE html>
<html>
<head>

</head>

<body>
<h3>File Upload Example</h3>
<h4>Supported extensions: jpg/jpeg , png , gif</h4>

<form method="POST" action="FileUploadServer.php"
 enctype="multipart/form-data"
>
    <input type="file" name="fileToUpload" id="fileToUpload" />
    <br/>
    <input type="submit" name="submit" value="Upload Chosen File" />
    <br/>
</form>
</body>
</html>