<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Procurar palavras em arquivos</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap-4.0.0/dist/css/bootstrap.min.css">
</head>
<style type="text/css">
      body {
        margin: 0px
    }
    .container {
        width: 50vw;
        height: 50vh;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center
    }
    .box {
        width: 950px;
        height: 300px;
        background: #fff;
    }

</style>
<body>
<div style=" margin-top: 20px; text-align:center; margin-left: 2px; ">
 <h1 >Palavra a ser procurada em um arquivo.</h1>

<div style="" class="container" >
   <div class="box">

   <div class="form-group row">
  <label for="example-text-input" class=" col-4 col-form-label">Pasta a ser procurada:</label>
  <div class="col-8">
    <input class="form-control form-control-sm" type="text"  id="pasta">
  </div>
</div>
<div class="form-group row">
  <label for="example-search-input" class="col-4 col-form-label">Palavra a ser procurada:</label>
  <div class="col-8">
    <input class="form-control form-control-sm" type="search"  id="palavra" placeholder="Se houver mais de uma palavra separar por virgula">
  </div>
</div>

<div class="form-group row">
  <label for="example-search-input" class="col-4 col-form-label"></label>
  <div class="col-6">
   <button type="submit" class="btn btn-primary   col-6 form-control-sm  " onclick="enviar();">Procurar</button>
  </div>
</div>

</div>
</div>
 </div>
</body>
</html>
<script type="text/javascript">
  
function  enviar(){
    location.href="script.php?Pasta="+document.getElementById("pasta").value+"&Palavra="+document.getElementById('palavra').value;

  }
</script>