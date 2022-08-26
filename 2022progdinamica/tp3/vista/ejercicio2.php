<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/2022progdinamica/tp1/vista/bootstrap-5.2.0-dist/css/bootstrap.min.css">
    <link href="" rel="stylesheet">
    <title>Document</title>

</head>
<body>
    <div>
        <form id="form1" name="form1" method="post" action="../control/ej2.php" enctype="multipart/form-data">            
            <div class="mb-3">
            <label for="validationCustom03" class="form-label">Seleccionar un archivo:</label>
            <input name="archivo" type="file" class="form-control" id="archivo">
            </div>
            <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button id="btn-sub" type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>

    
</body>
<script src="index.js" type="text/javascript"></script>
<script src="./bootstrap-5.2.0-dist/js/bootstrap.min.js"></script>
</html>