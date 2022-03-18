
<div class="container div-principal">
	<div class="row justify-content-md-center">
		
		<?php
			
			foreach ($links as $idx => $row) {
				echo '<div class="col-12 col-sm-6 col-md-4 div_principal " >';
				echo '<a href="'.base_url().$row['enlace'].'" class="btn btn-sm btn-white"> <div class="col-12 "> <icon class="'.$row['icon'].'"></icon></div> <div class="col-12">'.$row['descripcion'].'</div> </a>';
				echo '</div>';
			}

		?>
		
	</div>
</div>

