<?php get_header(); ?>

<main>
<div class="menu-page-margins">

<div class="menu-page-background-container">
   <div class="menu-container">
     <h2 class="menu-container__title">Veganease Menu</h2>

     <h4 class="menu-food-type-title">Breakfast</h4>
     <div class="menu-items-container">

     <?php if( have_rows('create_breakfast_menu_item') ):
    while( have_rows('create_breakfast_menu_item') ) : the_row();
        $menu_item_name = get_sub_field('menu_item_name');
        $menu_item_description = get_sub_field('menu_item_description');
        $menu_item_image = get_sub_field('menu_item_image');
        ?>
        <div class="menu-item">
         <h5 class="menu-item__name"><?php echo $menu_item_name;?></h5>
         <p class="menu-item__desc"><?php echo $menu_item_description;?></p>
        </div> <!-- breakfast menu item -->

   <?php endwhile;

// No value.
else :
    // Do something...
endif; ?>
     </div> <!-- breakfast menu items container -->

     <!-- lunch menu items container -->
     <h4 class="menu-food-type-title">Lunch</h4>

     <div class="menu-items-container">
<?php if( have_rows('create_lunch_menu_item') ):
while( have_rows('create_lunch_menu_item') ) : the_row();
   $menu_item_name = get_sub_field('menu_item_name');
   $menu_item_description = get_sub_field('menu_item_description');
   $menu_item_image = get_sub_field('menu_item_image');
   ?>
   <div class="menu-item">
    <h5 class="menu-item__name"><?php echo $menu_item_name;?></h5>
    <p class="menu-item__desc"><?php echo $menu_item_description;?></p>
   </div> <!-- lunch menu item -->

<?php endwhile;

// No value.
else :
// Do something...
endif; ?>
</div> <!-- lunch menu items container -->


<!-- dinner menu items container -->
<h4 class="menu-food-type-title">Dinner</h4>

<div class="menu-items-container">
<?php if( have_rows('create_dinner_menu_item') ):
while( have_rows('create_dinner_menu_item') ) : the_row();
$menu_item_name = get_sub_field('menu_item_name');
$menu_item_description = get_sub_field('menu_item_description');
$menu_item_image = get_sub_field('menu_item_image');
?>
<div class="menu-item">
<h5 class="menu-item__name"><?php echo $menu_item_name;?></h5>
<p class="menu-item__desc"><?php echo $menu_item_description;?></p>
</div> <!-- lunch menu item -->

<?php endwhile;

// No value.
else :
// Do something...
endif; ?>
</div> <!-- dinner menu items container -->


<!-- snack menu items container -->
<h4 class="menu-food-type-title">Snacks</h4>

<div class="menu-items-container">
<?php if( have_rows('create_snack_menu_item') ):
while( have_rows('create_snack_menu_item') ) : the_row();
$menu_item_name = get_sub_field('menu_item_name');
$menu_item_description = get_sub_field('menu_item_description');
$menu_item_image = get_sub_field('menu_item_image');
?>
<div class="menu-item">
<h5 class="menu-item__name"><?php echo $menu_item_name;?></h5>
<p class="menu-item__desc"><?php echo $menu_item_description;?></p>
</div> <!-- lunch menu item -->

<?php endwhile;

// No value.
else :
// Do something...
endif; ?>
</div> <!-- snack menu items container -->


    


   </div> <!-- menu -->
</div> <!-- menu pg bg container -->

</div> <!-- menu page margins -->
</main>

<?php get_footer(); ?>