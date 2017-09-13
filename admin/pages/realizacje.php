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
						<a href="#">Realizacje</a>
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
						include "realizacje/create.php";
						break;
					case "edit":
						include "realizacje/edit.php";
						break;
					case "delete":
						include "realizacje/delete.php";
						break;
					case "details":
						include "realizacje/details.php";
						break;
					case "addphoto":
						include "realizacje/addphoto.php";
						break;
					case "deletephoto":
						include "realizacje/deletephoto.php";
						break;
					default:
						include "realizacje/list.php";
						break;
				}
			}
			else {
				include "realizacje/list.php";
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