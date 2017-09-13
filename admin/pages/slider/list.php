<?php
if(!defined('ANTY_HACK') || ANTY_HACK != 'DS_CMS')
    die('Strona została wywołana w nieodpowiedni sposób. Wykonywanie skryptu zatrzymane!');

require_once('scripts/Slider.php');

$slider = new Slider();

$slider_list = $slider->FList();

?>

<div class="col-md-2 col-md-offset-10" style="text-align: right; margin-bottom: 20px;">
    <a href="slider-create" class="btn btn-success">Dodaj slider</a>
</div>

<div class="col-md-12 col-xs-12">
<?php foreach ($slider_list as $slide){ ?>
    <div class="white-box">
        <div class="row">
            <div class="col-md-7" style="height: 190px; overflow: hidden;">
                <a href="portfolio-item.html">
                    <img class="img-responsive img-hover" src="../assets/img/main-slider/<?php echo $slide['Image']; ?>" alt="">
                </a>
            </div>
            <div class="col-md-5">
                <h3><?php echo $slide['Title']; ?> <small>No. <?php echo $slide['OrderNo']; ?></small></h3>
                <p><a href="<?php echo $slide['URL']; ?>"><?php echo $slide['URL']; ?></a></p>
                <a class="btn btn-primary" href="slider-edit-<?php echo $slide['ID']; ?>">Edytuj</a>
				<a class="btn btn-danger" href="slider-delete-<?php echo $slide['ID']; ?>">Usuń</a>
            </div>

        </div>
    </div>
<?php } ?>
</div>