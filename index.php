<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Procurar palavras em arquivos</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="bootstrap-4.0.0/dist/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script  src="bootstrap-4.0.0/dist/js/jquery-3.3.1.min.js"> </script> -->

   <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="bootstrap-4.0.0/dist/css/bootstrap.min.css">
 <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script> -->
  <script  src="bootstrap-4.0.0/dist/js/jquery-3.3.1.min.js"> </script>
  <script src="./bootstrap-4.0.0/assets/js/vendor/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<!-- Nav tabs -->

<div class="container">
      <div class="row">
          <div class="col-md-10">
              
         
         <div class="container">

           <br>
           <!-- Nav tabs -->
           <ul class="nav nav-tabs" role="tablist">
             <li class="nav-item">
               <a class="nav-link active" data-toggle="tab" href="#home">Procura correspondencia</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" data-toggle="tab" href="#menu1">Relalizar diff</a>
             </li>
           </ul>

           <!-- Tab panes -->
           <fieldset>
           <div class="tab-content">
             <div id="home" class="container tab-pane active">
             <div style=" margin-top: 20px; margin-left:250px; text-align: center;"> <font  size="6" face="Times">Palavra a ser procurada em um arquivo. </font></div> 
               <?php include("script001.php");?>
             </div>
             <div id="menu1" class="container tab-pane fade"><br>

            <div style=" margin-top: 20px; margin-left:250px; text-align: center;"> <font  size="6" face="Times">Procurar diferença entre arquivos</font></div>
               <?php include("diff.html");?>
             </div>
           </div>
           </fieldset>
         </div>
                
            
          </div>


     </div>

<!-- <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
  </li>

  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
  </li>

  <li class="nav-item">
    <a class="nav-link" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">Messages</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">Settings</a>
  </li>
</ul> -->
<!-- 
<div class="tab-content">
  <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">.1..</div>
  <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">.2..</div>
  <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">.3..</div>
  <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">.4..</div>
</div> -->

</div>
</body>
</html>

<script type="text/javascript">

$(document).ready(function(){
    $("p").click(function(){
        alert("The paragraph was clicked.");
    });
});


</script>
