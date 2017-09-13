<?php
require_once('admin/scripts/Oferta.php');


$oferta = new Oferta();

$oferta_get = FALSE;
$oferta_zdjecia;

if (isset($_GET['id'])) {

    $oferta_get = $oferta->Get_Cat($_GET['id']);
}

if ($oferta_get != FALSE){

    $oferta_zdjecia = $oferta->List_Photo($_GET['id']);
?>

<div class="container" id="content">
    <div class="row">
        <div class="col-md-6">
            <img class="img-responsive" src="../assets/img/offer-category/<?php echo $oferta_get['Image']; ?>" alt="" />
        </div>
        <div class="col-md-6 desc">
            <h2>
                <?php echo $oferta_get['Title']; ?>
            </h2>
            <p>
                <?php echo $oferta_get['Description']; ?>
            </p>
        </div>
    </div>

    <?php if ($oferta->Count_Photo_For_Cat($_GET['id']) > 0) { ?>
    <div class="row gallery" style="margin-top: 40px;">
        <?php
        $count = $oferta->Count_Photo_For_Cat($_GET['id']);

        foreach ($oferta_zdjecia as $photo) {
        ?>
        <div class="col-md-3 img-portfolio">
            <a href="../assets/img/offer-photo/<?php echo $photo['Image']; ?>">
                <img class="img-responsive img-hover" src="../assets/img/offer-photo/<?php echo $photo['Image']; ?>" alt="" />
            </a>         
        </div>
        <?php }
          } ?>
    </div>

    <div class="well col-md-8 col-md-offset-2" style="margin-top: 20px;">
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

<?php } else { ?>

<div class="container" id="content">
    <div class="row">
        <h2 class="text-center">Nie prawidłowe ID oferty</h2>
    </div>
</div>

<?php } ?>


<div id="myModal" class="modal">

    <!-- The Close Button -->
    <span class="close" onclick="document.getElementById('myModal').style.display='none'">
        <i class="glyphicon glyphicon-remove"></i>
    </span>

    <!-- Modal Content (The Image) -->
    <img class="modal-content" id="img01" />

    <!-- Modal Caption (Image Text) -->
    <div id="caption"></div>
</div>