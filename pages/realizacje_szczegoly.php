<?php
require_once('admin/scripts/Realizacje.php');
$realizacje = new Realizacje();

$realizacje_get = FALSE;
$realizacje_zdjecia;

if (isset($_GET['id'])) {

    $realizacje_get = $realizacje->Get_Cat($_GET['id']);
}

if ($realizacje_get != FALSE){

    $realizacje_zdjecia = $realizacje->List_Photo($_GET['id']);
?>

<div class="container" id="content">
    <div class="row">
        <div class="col-md-6">
            <img class="img-responsive" src="../assets/img/realizations-category/<?php echo $realizacje_get['Image']; ?>" alt="" />
        </div>
        <div class="col-md-6 desc">
            <h2>
                <?php echo $realizacje_get['Title']; ?>
            </h2>
            <p>
                <?php echo $realizacje_get['Description']; ?>
            </p>
        </div>
    </div>

    <?php if ($realizacje->Count_Photo_For_Cat($_GET['id']) > 0) { ?>
    <div class="row gallery" style="margin-top: 40px;">
        <?php
              $count = $realizacje->Count_Photo_For_Cat($_GET['id']);

              foreach ($realizacje_zdjecia as $photo) {
        ?>
        <div class="col-md-3 img-portfolio">
            <a href="../assets/img/realizations-photo/<?php echo $photo['Image']; ?>">
                <img class="img-responsive img-hover" src="../assets/img/realizations-photo/<?php echo $photo['Image']; ?>" alt="" />
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