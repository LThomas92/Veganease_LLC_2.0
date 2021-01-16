<?php 
    $title = get_field('title');
    $desc =  get_field('description');
    $products = get_field('products');
    $buildYourFreedomProds = get_field('build_freedom_product');
?>

<div class="coaching-services">
<h2 class="coaching-services__title"><?php echo $title;?></h2>
<div class="coaching-services__desc">
<?php echo $desc;?>
</div>


<p class="more-info">[click for more info]</p>

<?php
if($products): ?>
    <ul class="coaching-services__products">
    <?php foreach( $products as $product ): 
        $permalink = get_permalink( $product->ID );
        $title = get_the_title( $product->ID );
        $desc = get_the_excerpt($product->ID);
        $price = get_post_meta($product->ID, '_regular_price', true);
        ?>
        <li>
            <a href="<?php echo esc_url($permalink); ?>"><?php echo esc_html($title); ?><span class="coaching-services__products__price">$<?php echo $price; ?></span></a>
            <div class="coaching-services__products__desc"><?php echo $desc; ?></div>
        </li>
    <?php endforeach; ?>
    </ul>
<?php endif; ?>


<?php
if($buildYourFreedomProds): ?>
    <ul class="coaching-services__products">
    <?php foreach( $buildYourFreedomProds as $buildYourFreedomProd ): 
        $permalink = get_permalink( $buildYourFreedomProd->ID );
        $title = get_the_title( $buildYourFreedomProd->ID );
        $price = get_post_meta($buildYourFreedomProd->ID, '_regular_price', true);
        ?>
        <li>
            <a href="<?php echo esc_url($permalink); ?>"><?php echo esc_html($title); ?><span class="coaching-services__products__price">$<?php echo $price; ?></span></a>
        </li>
    <?php endforeach; ?>
    </ul>
<?php endif; ?>

</div> <!-- coaching services -->