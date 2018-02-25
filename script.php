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
}
</style>
<body>
<div>

<div class="container">
  <h1 class="page-heade r" >Procura arquivos correspondete</h1>
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
          <td>Conteúdo</td>
          <td>Conteúdo</td>
          <td>Conteúdo</td>

        </tr> -->
   


<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);



$Directory = new RecursiveDirectoryIterator($_GET['Pasta']);
$Iterator  = new RecursiveIteratorIterator($Directory);
$types     = array( 'png', 'jpg', 'jpeg', 'gif','js','php','txt','sql' );
$contador=0;

$palavraDeProcura= explode(",",$_GET['Palavra']);

foreach ($Iterator as $value1) {

    $ext = strtolower( $value1->getExtension() );
    if( in_array( $ext, $types ) ){

      $lendoArquivo=file_get_contents($value1->getPathname());
       foreach ($palavraDeProcura as $key => $palavraprocurada) {
        
                  //echo $lendoArquivo;
                  preg_match('/'.$palavraprocurada.'/',$lendoArquivo, $matches, PREG_OFFSET_CAPTURE);
                //var_dump($palavraprocurada);
              //  var_dump($matches);
                  //var_dump(in_array($palavraprocurada, $matches));
                  foreach ($matches as $key => $value) {

                    if (in_array($palavraprocurada, $value)) { 
                      $contador++;
                    ?>
                     <tr>
                     <th ><?php echo $contador;?></th>
                     <td class=""><?php echo $value1->getPath();?></td>
                     <td class=""><?php echo $value[$key];?></td>
                     <td class=""><?php echo $value1->getFileName()?></td>
    
                    </tr>
                    <?php
                    }

                  }
                
          }


      }

}


?>

   </tbody>
    </table>
    
  <div class="" id="total">
           <b>Total de arquivos com correspondecia: &nbsp <?php echo "\t".$contador ?></b>
  </div>
</div>
 
</div>

</body>

</html>


