<?php
require_once('admin/scripts/Oferta.php');

$oferta = new Oferta();

$oferta = $oferta->List_Cat();

?>

<div class="container" id="content">
    <div class="row desc">
        <?php foreach ($oferta as $elem) { ?>
            <div class="col-md-6 img-portfolio">
                <a href="oferta-szczegoly-<?php echo $elem['ID']; ?>">
                    <img class="img-responsive img-hover" src="assets/img/offer-category/<?php echo $elem['Image']; ?>" alt="" />
                </a>
                <h3>
                    <a href="oferta-szczegoly-<?php echo $elem['ID']; ?>"><?php echo $elem['Title'];?></a>
                </h3>
                <p><?php echo $elem['ShortDescription']; ?></p>
                <a class="btn btn-primary btn-green" href="oferta-szczegoly-<?php echo $elem['ID']; ?>">
                    Więcej
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        <?php } ?>    
    </div>

    <div class="well col-md-8 col-md-offset-2">
        <div class="row">
            <div class="col-md-12">
                <h3>Potrzebujesz czegoś więcej, chcesz nawiązać współpracę?</h3>
                <p>Skontaktuj się z nami – przygotujemy ofertę specjalnie dla Ciebie.</p>
            </div>
            <div class="col-md-4 col-md-offset-4">
                <a class="btn btn-lg btn-default btn-block" href="/kontakt">Zadzwoń lub napisz!</a>
            </div>
        </div>
    </div>
</div>
<!-- #endregion -->