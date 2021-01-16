<?php 
    $title = get_field('title');
    $desc = get_field('description');
    $brunchMenu = get_field('brunch_menu');
    $dinnerMenu = get_field('dinner_menu');
?>

<div class="catering-services">
<h2 class="catering-services__title"><?php echo $title; ?></h2>
<div class="catering-services__desc">
<p><?php echo $desc;?></p>
</div> <!-- catering services desc -->

<div class="catering-services__menu">
<a target="_blank" href="<?php echo $brunchMenu; ?>">Brunch Menu</a>
<a target="_blank" href="<?php echo $dinnerMenu; ?>">Dinner Menu</a>
</div>

</div> <!-- catering services -->