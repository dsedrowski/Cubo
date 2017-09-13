<?php
if(!defined('ANTY_HACK') || ANTY_HACK != 'DS_CMS')
    die('Strona została wywołana w nieodpowiedni sposób. Wykonywanie skryptu zatrzymane!');
?>
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row bg-title">
			<div class="col-lg-12">
				<h4 class="page-title">Witamy w DS_CMS</h4>
				<ol class="breadcrumb">
					<li>
						<a href="#">Oferta</a>
					</li>
				</ol>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<div class="row">
			<?php
			if(isset($_GET['action'])){
				switch ($_GET['action']){
					case "create":
						include "oferta/create.php";
						break;
					case "edit":
						include "oferta/edit.php";
						break;
					case "delete":
						include "oferta/delete.php";
						break;
					case "details":
						include "oferta/details.php";
						break;
					case "addphoto":
						include "oferta/addphoto.php";
						break;
					case "deletephoto":
						include "oferta/deletephoto.php";
						break;
					default:
						include "oferta/list.php";
						break;
				}
			}
			else {
				include "oferta/list.php";
			}
            ?>
		</div>
	</div>
	<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<div id="myModal" class="modal">

	<!-- The Close Button -->
	<span class="close" onclick="document.getElementById('myModal').style.display='none'"><i class="glyphicon glyphicon-remove"></i></span>

	<!-- Modal Content (The Image) -->
	<img class="modal-content" id="img01" />

	<!-- Modal Caption (Image Text) -->
	<div id="caption"></div>
</div>