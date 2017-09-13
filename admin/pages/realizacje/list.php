<?php
if(!defined('ANTY_HACK') || ANTY_HACK != 'DS_CMS')
    die('Strona została wywołana w nieodpowiedni sposób. Wykonywanie skryptu zatrzymane!');

require_once('scripts/Realizacje.php');

$realizacje = new Realizacje();

$realizacje_list = $realizacje->List_Cat();

?>

<div class="col-md-2 col-md-offset-10" style="text-align: right; margin-bottom: 20px;">
    <a href="realizacje-create" class="btn btn-success">Dodaj kategorię</a>
</div>

<div class="col-md-12 col-xs-12">
    <div class="white-box">
		<div class="row">
			<table class="table">
				<thead>
					<tr>
						<th width="5%">No.</th>
						<th width="50%">Tytuł</th>
						<th width="20%">Ilość zdjęć</th>
						<th width="25%"></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($realizacje_list as $elem) { ?>
						<tr>
							<td>
								<?php echo $elem['OrderNo']; ?>
							</td>
							<td>
								<?php echo $elem['Title']; ?>
							</td>
							<td>
								<?php echo $realizacje->Count_Photo_For_Cat($elem['ID']); ?>
							</td>
							<td>
								<a href="realizacje-details-<?php echo $elem['ID']; ?>" class="btn btn-success">Pokaż</a>
                                <a href="realizacje-edit-<?php echo $elem['ID']; ?>" class="btn btn-warning">Edytuj</a>
                                <a href="realizacje-delete-<?php echo $elem['ID']; ?>" class="btn btn-danger">Usuń</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
    </div>
</div>