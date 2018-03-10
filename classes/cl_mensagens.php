<?php


/**
* 
*/
class cl_mensagens
{
	
	private $mensagens;
	private $tipo;

	function __construct()
	{
		
	}

	public function setMensagens($mensagens,$tipo){
		$this->mensagens=$mensagens;
		$this->tipo=$tipo;

	}

	public function getMensagens(){
   
          switch ($this->tipo) {
          	   case 1:

          		echo  '<div class="alert alert-success">'.
    					$this->mensagens.'
  						</div>';
          		break;

          		 case 2:

          		echo  '<div class="alert alert-info">'.
    					$this->mensagens.'
  						</div>';
          		break;

          		case 3:

          		echo  '<div class="alert alert-warning">'.
    					$this->mensagens.'
  						</div>';
          		break;

          		case 4:

          		echo  '<div class="alert alert-danger">'.
    					$this->mensagens.'
  						</div>';
          		break;
          	
          	default:
              
          		break;
          }
	}


}