<?php
	function printMB($title, $contentMainBlock){
?>
			<main id='main'>
					<section class="breadcrumbs">
					  <div class="container">

						<div class="d-flex justify-content-between align-items-center">
						  <h2><?php echo $title ?></h2>
						</div>

					  </div>
					</section>
					
					<section class="inner-page pt-4">
					  <div class="container">
					  <?php
						echo $contentMainBlock;
					  ?>
					  </div>
					</section>
			</main>

<?php
	}
?>
