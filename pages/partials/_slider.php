<?php
require_once('admin/scripts/Slider.php');

$slider = new Slider();

$slides_count = $slider->Count();
$slides = $slider->FList();

?>

<header id="main-slider" class="carousel slide">
    <!-- #region KROPECZKI -->
    <ol class="carousel-indicators">
		<?php for ($i = 0; $i < $slides_count; $i++) { ?>
			<li data-target="#main-slider" data-slide-to="<?php echo $i; ?>" <?php if ($i == 0) echo "class='active'"; ?>></li>
		<?php } ?>
    </ol>
    <!-- #endregion -->
    <!-- #region SLAJDY -->
    <div class="carousel-inner">
		<?php for ($i = 0; $i < $slides_count; $i++) { ?>
		<div class="item <?php if ($i == 0) echo "active"; ?>">
			<div class="fill" style="background-image:url('../assets/img/main-slider/<?php echo $slides[$i]['Image']; ?>');"></div>
			<div class="carousel-caption">
				<h2><a href="<?php echo $slides[$i]['URL'];?>"><?php echo $slides[$i]['Title']; ?></a></h2>
			</div>
		</div>
        <?php } ?>        
    </div>
    <!-- #endregion -->
    <!-- #region NAWIGACJA -->
    <a class="left carousel-control" href="#main-slider" data-slide="prev">
        <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control" href="#main-slider" data-slide="next">
        <span class="icon-next"></span>
    </a>
    <!-- #endregion -->
</header>