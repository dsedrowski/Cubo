<?php
require_once('admin/scripts/Realizacje.php');

$realizacje = new Realizacje();

$realizacje = $realizacje->List_Cat();

?>

<div class="container" id="content">
    <div class="row desc">
        <?php 
        if (count($realizacje) > 0) {
        foreach ($realizacje as $elem) { ?>
            <div class="col-md-4 img-portfolio">
                <a href="realizacje-szczegoly-<?php echo $elem['ID']; ?>">
                    <img class="img-responsive img-hover" src="assets/img/realizations-category/<?php echo $elem['Image']; ?>" alt="" />
                </a>
                <h3>
                    <a href="realizacje-szczegoly-<?php echo $elem['ID']; ?>">
                        <?php echo $elem['Title'];?>
                    </a>
                </h3>
                <p><?php echo $elem['ShortDescription']; ?></p>
            </div>
        <?php } } else { ?>    
        <h2 class="text-center">Zapraszamy wkrótce!</h2>
        <?php } ?>
    </div>
</div>
<!-- #endregion -->