

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Title of the document</title>
  <link rel="stylesheet" href="bootstrap-4.0.0/dist/css/bootstrap.min.css">
</head>
<style type="text/css">
  
  #total  {
    background: #00baba;
    color: #FFF;
    padding: 10px;
    margin-bottom: 10px;
}

footer{
  padding: 10px;
  /*background: #26434c;*/
 /* border-top: 1px solid #243240;*/
}


}


</style>
<body>
<div>

<div class="container">
  <h1 class="page-heade r" >Procura arquivos correspondentes</h1>
  <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">

      <thead>
      <tr style="background-color:#808080;">
        <th>#</th>
        <th>Pasta a ser procurada</th>
        <th>Palavra a ser procurada</th>
        <th>Arquivo correspondete </th>
      </tr>
      </thead>
      <tbody>
       
        <!-- <tr>
          <th>2</th>
          <td>ConteÃºdo</td>
          <td>ConteÃºdo</td>
          <td>ConteÃºdo</td>

        </tr> -->
   


<?php

 // ini_set('display_errors',1);
 // ini_set('display_startup_erros',1);
 // error_reporting(E_ALL);
try
{

$Directory = new RecursiveDirectoryIterator($_GET['Pasta']);
$Iterator  = new RecursiveIteratorIterator($Directory);
$types     = array( 'png', 'jpg', 'jpeg', 'gif','js','php','txt','sql' );
$contador  = 0;
$sensintive= "";
$tipo      = "";
$pastaarquivos  = mt_rand();
$filenames = array();
$copy=$_GET['Copy'];

if($copy=="true"){

    rrmdir("arquivos");
    mkdir("arquivos/".$pastaarquivos, 0700);

}
if($_GET['sensintive']=='true'){
   $sensintive='i';
}

$palavraDeProcura= explode(",",$_GET['Palavra']);

foreach ($Iterator as $value1) {

    $ext = strtolower( $value1->getExtension() );
    if( in_array( $ext, $types ) ){

      $lendoArquivo=file_get_contents($value1->getPathname());
       foreach ($palavraDeProcura as $key => $palavraprocurada) {
              
              if (!empty($_GET['Expressao'])) {
                     
                      $tipo=$_GET['Expressao'];

              }else{

                $tipo='/'.$palavraprocurada.'/'.$sensintive;
              }
          
                 $porpalavra=preg_match($tipo,$lendoArquivo, $matches, PREG_OFFSET_CAPTURE);
                   
                if($porpalavra==1){
                   $contador++;
                   $filenames[] = 'arquivos/'.$pastaarquivos.'/'.$value1->getFileName();
  
                   echo "
                    <tr>
                     <th >$contador </th>
                     <td >".$value1->getPath()." </td>
                     <td > $palavraprocurada </td>
                     <td >".$value1->getFileName()." </td>
                    </tr>
      

                   ";

                if($_GET['Copy']=="true"){
      

                 copy($value1->getPath()."/".$value1->getFileName(),'arquivos/'.$pastaarquivos.'/'.$value1->getFileName());
                          

                     }


                   }
                
          }


      }

}


$directory = "arquivos/".$pastaarquivos;
// the name of your zip archive to be created
$zipfile = 'arquivos/'.$pastaarquivos.'.zip';
$zip = new ZipArchive();
if ($zip->open($zipfile, ZIPARCHIVE::CREATE)!==TRUE) {
    exit("cannot open <$zipfile>\n");
}

foreach ($filenames as $filename) {
    $zip->addFile($filename,$filename);
}

//echo "Total de arquivos zipados " . $zip->numFiles . "\n";
$zip->close();
//downloand("arquivos",$pastaarquivos.'.zip');

}catch (Exception $e)
{
   
     echo "<div class='alert alert-danger'>
          <strong>Failed to open dir ! </strong>. No such file or directory
          </div>";


   
}


function rrmdir($dir) { 
   if (is_dir($dir)) { 
     $objects = scandir($dir); 
     foreach ($objects as $object) { 
       if ($object != "." && $object != "..") { 
         if (filetype($dir."/".$object) == "dir") rrmdir($dir."/".$object); else unlink($dir."/".$object); 
       } 
     } 
     reset($objects); 
     rmdir($dir); 
   } 
} 

?>

   </tbody>
    </table>
    
  <div class="" id="total">
           <b>Total de arquivos com correspondência: &nbsp <?php echo "\t".$contador ?></b>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="button" class="btn btn-primary" onclick="voltar() " >Voltar </button>
          <?php if($copy=="true"){?>
         <a class="btn btn-primary" <?php echo  "href=arquivos/$pastaarquivos.zip";?> > Dowload dos arquivos com ocorrência </a>
         <?php }?>
     
    </div>
  </div>

  </div>

   
</div>

<footer> <!-- Aqui e a area do footer -->
  <div class="container">
    <div class="row">
      <!-- Aqui e a area dos links importantes -->
      <!-- Aqui e a area das redes sociais -->
      <div id="logoFooter" class="col-md-3">
        <p>Author: Valdeilton de souza felix</p>
      </div> <!-- Aqui e a area da logo do rodape -->
  
  </div>
</footer>

<!-- <div class="copyright">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <p>&copy; Todos os direitos reservados.</p>
      </div>
    </div>
  </div>
</div> -->
</body>

</html>
<script type="text/javascript">
  function voltar(){
    location.href="index.php";
  } 

//   function showHint() {
    
//         var xmlhttp = new XMLHttpRequest();
//              xmlhttp.onreadystatechange = function() {
//                if (this.readyState == 4 && this.status == 200) {
              
//             }
//         }
//         xmlhttp.open("GET", "download.php?exec=true", true);
//         xmlhttp.send();
    
// }
// showHint();
</script>








