
<?php
  require_once "classes/cl_arquivo.php";
  require_once "classes/cl_mensagens.php";

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Gerando resultado</title>
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
  <h1 class="page-heade r" >Procurar arquivos correspondentes com a palavra procurada.</h1>
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

$arquivodir = new cl_arquivo;
$cl_mensagens= new cl_mensagens;

$arquivodir->setDirectory($_GET['Pasta']);
$Iterator   =  $arquivodir->getDirectory();

$types     = array( 'png', 'jpg', 'jpeg', 'gif','js','php','txt','sql' );
$contador  = 0;
$sensintive= "";
$tipo      = "";
$filenames = array();
$copy=$_GET['Copy'];

if($copy=="true"){
  
    $arquivodir->rmoverPastaSubPasta('arquivos');
    $arquivodir->criarPasta("arquivos/".$arquivodir->__getPastaGerada());

}

if($_GET['sensintive']=='true'){
   $sensintive='i';
}

$palavraDeProcura= explode(",",$_GET['Palavra']);

foreach ($Iterator as $value1) {

    $ext = strtolower( $value1->getExtension() );


if(preg_match('/'.$arquivodir->__getPastaGerada().'/',$value1->getPath())!=1){
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
                   $filenames[] = 'arquivos/'.$arquivodir->__getPastaGerada().'/'.$value1->getFileName();
  
                   echo "
                    <tr>
                     <th >$contador </th>
                     <td >".$value1->getPath()." </td>
                     <td > $palavraprocurada </td>
                     <td >".$value1->getFileName()." </td>
                    </tr>
      

                   ";

                if($_GET['Copy']=="true"){     
                      copy($value1->getPath()."/".$value1->getFileName(),'arquivos/'.$arquivodir->__getPastaGerada().'/'.$value1->getFileName());                         

                     }


                   }
                
          }


      }
   }
}
if($copy=="true"){
$pastaarquivos=$arquivodir->__getPastaGerada();
$arquivodir->ziper("../arquivos/".$arquivodir->__getPastaGerada(),'arquivos/'.$arquivodir->__getPastaGerada().'.zip',$filenames);
}

}catch (Exception $e)
{
  
    $cl_mensagens->setMensagens("<strong>Erro ao processar as informações !</strong>",4);
    $cl_mensagens->getMensagens();
   
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

<footer>
  <div class="container">
    <div class="row">
      <div id="logoFooter" class="col-md-3">
        <p>Author: Valdeilton de souza felix</p>
      </div>
  
  </div>
</footer>
</body>

</html>
<script type="text/javascript">
  function voltar(){
    location.href="index.php";
  } 
</script>








