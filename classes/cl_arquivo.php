<?php

class cl_arquivo{
	
      private $directory;
      private $nomearquivo;
      private $remuvedirectory;
     
      private $ziper;
      private $filename;
      private $pastagerada;

      public function __construct(){
        $this->pastagerada=mt_rand();
        $this->ziper = new ZipArchive();
      }

      public function setDirectory($dir){
      $this->directory = new RecursiveDirectoryIterator($dir);
      }
     
      public function getDirectory(){
      return new RecursiveIteratorIterator($this->directory);
      }

      public function __getPastaGerada(){
  
        return $this->pastagerada;
      }

      public function rmoverPastaSubPasta($dir){
      	    try{

				if (is_dir($dir."/")) { 

						$objects = scandir($dir); 
							foreach ($objects as $object) { 
								if ($object != "." && $object != "..") { 
									if (filetype($dir."/".$object) == "dir") $this->rmoverPastaSubPasta($dir."/".$object); else unlink($dir."/".$object); 
									} 
								} 
						reset($objects); 
						rmdir($dir); 
		          } 

                }catch(Exception $e){

                   //echo $e->getMessage();

                }

      	}

      	public function criarPasta($caminho){

      	     try {
      	     	 	mkdir($caminho, 0700);
      	     	
      	     	} catch (Exception $e) {

      	     		echo $e->getMessage();
      	     	
      	     }


      }

      public function ziper($dir,$nomeArquivo,$files){

      	      try {
                 $this->directory=$dir;
                 $this->nomearquivo=$nomeArquivo;
                 $this->filenames=$files;


                 $zip = new ZipArchive();
					
					if ($zip->open($this->nomearquivo, ZIPARCHIVE::CREATE)!==TRUE) {
    						exit("cannot open <$zipfile>\n");
						}

					foreach ($this->filenames as $filename) {
    					$zip->addFile($filename,$filename);
						}
					$zip->close();

      	      } catch (Exception $e) {
      	      	
      	      }

      }

}