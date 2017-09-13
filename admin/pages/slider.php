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
                    <li><a href="#">Slidery</a></li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
			<?php
			if(isset($_GET['action'])){
				switch ($_GET['action']){
					case "create":
						include "slider/create.php";
						break;
					case "edit":
						include "slider/edit.php";
						break;
					case "delete":
						include "slider/delete.php";
						break;
					default:
						include "slider/list.php";
						break;
				}
			}
			else {
				include "slider/list.php";
			}
			?>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->