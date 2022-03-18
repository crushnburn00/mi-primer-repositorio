<?php

class Paginacion{
	protected $filas_por_pagina;
	protected $total_filas;
	protected $total_paginas;
	protected $tamanio;
	protected $paginacion;
	protected $pagAntSgte;
	protected $pagina;

	public function __construct(){
		$this->inicializar();
		$this->tamanio = 8 ;

	}

	public function setFilas( $filas_por_pagina){
		$this->filas_por_pagina = $filas_por_pagina;
	}

	public function setTotalFilas($total_filas){
		$this->total_filas = $total_filas;
	}

	public function setTotalPaginas($total_paginas){
		$this->total_paginas = $total_paginas;
	}

	public function setTamanio( $tamanio ){
		$this->tamanio =  $tamanio;
	}

	public function setPagina( $pagina ){
		$this->pagina =  $pagina;
	}

	private function generarPaginacion(){
		$i=0;

		//Fin de Paginacion
		$paginaFin = $this->total_paginas;
		//inicio paginacion
		$paginaIni = 1;
		
		//si la cantidad de paginas es menor o igual al tamaño
		if($this->total_paginas > 0):

			if($paginaFin<=$this->tamanio){
				for ($i=0; $i < $paginaFin ; $i++) { 
					$this->paginacion[$i] = array($i+1 , '');
				}
				$this->paginacion[$this->pagina-1][1] = 'active';
			}else{
				if($this->pagina>=1 && $this->pagina<($this->tamanio-2)){
					for ($i=0; $i < ($this->tamanio-2) ; $i++) { 
						$this->paginacion[$i] = array($i+1,'');
					}
					$this->paginacion[$i+1] = array('...','disabled');	
					$this->paginacion[$i+2] = array($paginaFin,'');
					$this->paginacion[$this->pagina-1][1] = 'active';	
				}else{
					$this->paginacion[$i++] = array($paginaIni,'');
					$this->paginacion[$i++] = array('...','disabled');
					if($this->pagina>=($paginaFin - 4)){
						for ($z=($paginaFin - 5); $z <= $paginaFin ; $z++) { 
							$this->paginacion[$i++] = array($z , '' );
						}
						$this->paginacion[7 - ($paginaFin-$this->pagina) ][1] = 'active';	
					}else{
						$this->paginacion[$i++] = array($this->pagina-1,'');
						$this->paginacion[$i++] = array($this->pagina,'active');
						$this->paginacion[$i++] = array($this->pagina+1,'');
						$this->paginacion[$i++] = array($this->pagina+2,'');
						$this->paginacion[$i++] = array('...','disabled');
						$this->paginacion[$i] = array($paginaFin,'');
					}
					
				}
			}
		else:
			$this->paginacion = array();
		endif;

		return $this->paginacion;
		
	}

	public function htmlPaginacion(){
		$this->generarPaginacion();
		$this->generarAntSig();

		$html = '<ul class="pagination ">';
		$a = $this->pagAntSgte['Anterior'] ;
		$html .='<li class="page-item '.$a[1].'"><a class="page-link getPaginacion" href="'.$a[0].'">Anterior</a></li>';
		foreach ($this->paginacion as $p){
			$html .='<li class="page-item '.$p[1].'"><a class="page-link getPaginacion" href="'.$p[0].'">'.$p[0].'</a></li>';
		}
		$s = $this->pagAntSgte['Siguiente'] ;
		$html .='<li class="page-item '.$s[1].'"><a class="page-link getPaginacion" href="'.$s[0].'">Siguiente</a></li>';
		$html .='  </ul>';
		return $html;
	}

	private function generarAntSig(){
		$this->inicializar();
		if($this->pagina>1)
			$this->pagAntSgte['Anterior'] = array($this->pagina - 1,'');

		if($this->total_paginas>1 && $this->pagina < $this->total_paginas)
			$this->pagAntSgte['Siguiente'] = array($this->pagina + 1,'');
	}

	private function inicializar(){
		$this->pagAntSgte = array( 'Anterior' => array( 0, 'disabled' ) , 'Siguiente' => array( 0, 'disabled' ) );
	}



}

?>