
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
		<title>PHP LibDiff - Examples</title>
		<link rel="stylesheet" href="php-diff/example/styles.css" type="text/css" charset="utf-8"/>
	</head>
	<body>
		<h1>Arquivos com diff</h1>
		<hr />
		<?php
			
     require_once 'php-diff/lib/Diff.php';
     require_once "classes/cl_arquivo.php";

    $array=array();
    $tipopasta1=$_GET['pastaouarquivo1'];
    $tipopasta2=$_GET['pastaouarquivo2'];
    $tipo=$_GET['tipoarquivo'];
    $arquivo001="";

  if($tipo=='arquivo'){
    if (file_exists($tipopasta1)) {
    
      	if(file_exists($tipopasta2)){
               
               $array[$tipopasta1]=$tipopasta2;

      	 }else{

     echo "<p style='color:red; background-color:#C0C0C0;'>Arquivo inexistente parametro 2 $tipopasta2 </p>";
     exit;

      	    }
    }else{

      echo "<p style='color:red;background-color:#C0C0C0;'>Arquivo inexistente do parametro 1 $tipopasta1 </p>";
      exit;
    }


}elseif ($tipo=='pasta') {

$arquivodir1 = new cl_arquivo;
$types     = array( 'png', 'jpg', 'jpeg', 'gif','js','php','txt','sql' );
if (is_dir($tipopasta1)) {

	   $arquivodir1->setDirectory($tipopasta1);
       $Iterator1   =  $arquivodir1->getDirectory();

foreach ($Iterator1 as $value1) {

	//var_dump( $value1);

    $ext = strtolower( $value1->getExtension() );

    if( in_array( $ext, $types ) ){
               $arquivo001=$value1->getPath()."/".$value1->getFileName();
                 
                   if (is_dir($tipopasta2)) {

                      		$arquivodir1->setDirectory($tipopasta2);
                      		$Iterator2   =  $arquivodir1->getDirectory();
 							foreach ($Iterator2 as $key => $value2) {

 								 if( in_array( $ext, $types ) ){

 								 		if ($value1->getFileName()==$value2->getFileName()) {
 								 		   
 								 		     $array[$arquivo001]= $value2->getPath()."/".$value2->getFileName();
 								 		}

 								 }
 							
 							
 							}


                       }else{
                           
                            echo "<p style='color:red;background-color:#C0C0C0;' >Diretorio inexistente !!</p>";die;
 
                       }
  
                   }
              
             }


         }
	
}else{

	echo "<p style='color:red;background-color:#C0C0C0;' >Diretorio inexistente !!</p>";die;
}


     foreach ($array as $key => $value) {
		//Include two sample files for comparison
		$a = explode("\n", file_get_contents($key));
		$b = explode("\n", file_get_contents($value));

		// Options for generating the diff
		$options = array(
			//'ignoreWhitespace' => true,
			//'ignoreCase' => true,
		);

		//Initialize the diff class
		$diff = new Diff($a, $b, $options);

		?>
		<h2>Arquivo com diffs</h2>
		<?php

		// Generate a side by side diff
		require_once 'php-diff/lib/Diff/Renderer/Html/SideBySide.php';
		$renderer = new Diff_Renderer_Html_SideBySide;
		$diff=$diff->Render($renderer);
          if($diff !=""){
               echo $diff;
            }else{

            	echo "<p style = color:green;background-color:#C0C0C0; > $key  => $value  </p>";
            }
		
        }
		?>
		<!-- <h2>Inline Diff</h2> -->
		<?php

		// Generate an inline diff
		///require_once dirname(__FILE__).'/../lib/Diff/Renderer/Html/Inline.php';
		//$renderer = new Diff_Renderer_Html_Inline;
		//echo $diff->render($renderer);

		?>
		<!-- <h2>Unified Diff</h2> -->
		<!-- <pre> --><?php

		// Generate a unified diff
		//require_once dirname(__FILE__).'/../lib/Diff/Renderer/Text/Unified.php';
		//$renderer = new Diff_Renderer_Text_Unified;
		///echo htmlspecialchars($diff->render($renderer));

		?>
		<!-- </pre> -->
		<!-- <h2>Context Diff</h2>
		<pre><?php

		// Generate a context diff
		//require_once dirname(__FILE__).'/../lib/Diff/Renderer/Text/Context.php';
		//$renderer = new Diff_Renderer_Text_Context;
	//	echo htmlspecialchars($diff->render($renderer));
		?>
		</pre> -->
	</body>
</html>