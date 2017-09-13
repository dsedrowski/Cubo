<?php
if(!defined('ANTY_HACK') || ANTY_HACK != 'DS_CMS')
    die('Strona została wywołana w nieodpowiedni sposób. Wykonywanie skryptu zatrzymane!');

require_once('scripts/Blog.php');

$blog = new Blog();

$blog_list = $blog->List_Blog();

?>

<div class="col-md-2 col-md-offset-10" style="text-align: right; margin-bottom: 20px;">
    <a href="blog-create" class="btn btn-success">Dodaj wpis</a>
</div>

<div class="col-md-12 col-xs-12">
    <div class="white-box">
		<div class="row">
			<table class="table">
				<thead>
					<tr>
						<th width="50%">Tytuł</th>
						<th width="20%">Data</th>
						<th width="25%"></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($blog_list as $elem) { ?>
						<tr>
							<td>
								<?php echo $elem['Title']; ?>
							</td>
							<td>
								<?php echo $elem['Date']; ?>
							</td>
							<td>
								<a href="blog-details-<?php echo $elem['ID']; ?>" class="btn btn-success">Pokaż</a>
                                <a href="blog-edit-<?php echo $elem['ID']; ?>" class="btn btn-warning">Edytuj</a>
                                <a href="blog-delete-<?php echo $elem['ID']; ?>" class="btn btn-danger">Usuń</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
    </div>
</div>