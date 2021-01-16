<?php 
    $title = get_field('title');
    $desc = get_field('description');
    $products = get_field('products');
    $vegamMealProds = get_field('vegan_meal_products');
?>

<div class="enhance-wellness-journey">
<h2 class="enhance-wellness-journey__title"><?php echo $title;?></h2>
<p class="enhance-wellness-journey__desc"><?php echo $desc;?></p>

<?php
$products= get_field('products');
if( $products ): ?>
    <ul class="enhance-wellness-journey__products">
    <?php foreach( $products as $product ): 
        $permalink = get_permalink( $product->ID );
        $title = get_the_title( $product->ID );
        $price = get_post_meta($product->ID, '_regular_price', true);
        ?>
        <li>
            <a href="<?php echo esc_url( $permalink ); ?>"><?php echo esc_html($title); ?></a>
            <p>$<?php echo $price; ?></p>
        </li>
    <?php endforeach; ?>
    </ul>
<?php endif; ?>

<p class="click-more-details">[click for more info]</p>

<div class="enhance-wellness-journey__vegan-meal-container">
<h3 class="enhance-wellness-journey__vegan-meal-prep__title">Vegan Meal Prep</h3>
<p class="enhance-wellness-journey__vegan-meal-prep__desc">(Weekly subscription, cancel anytime)</p>

<?php
$vegamMealProds = get_field('vegan_meal_products');
if( $vegamMealProds ): ?>
    <ul class="enhance-wellness-journey__vegan-meal-prods">
    <?php foreach($vegamMealProds as $vegamMealProd ): 
        $permalink = get_permalink($vegamMealProd->ID );
        $title = get_the_title( $vegamMealProd->ID );
        $price = get_post_meta($vegamMealProd->ID, '_regular_price', true);
        ?>
        <li>
            <a href="<?php echo esc_url( $permalink ); ?>"><?php echo esc_html($title); ?></a>
            <p>$<?php echo $price?></p>
        </li>
    <?php endforeach; ?>
    </ul>
<?php endif; ?>

</div> <!-- vegan meal prod container -->




</div> <!-- enhance wellness journey -->