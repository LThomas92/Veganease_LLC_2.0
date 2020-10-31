<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Veganease
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://use.typekit.net/etb7gpt.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

	<header id="masthead" class="site-header">
		<nav id="site-navigation" class="main-navigation">

			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
		</nav><!-- #site-navigation -->
		<!-- RIGHT MENU -->
		
 <nav class="header-right-menu-container">
 <ul class="header-right-menu">
 <li class="header-right-menu__item"><div class="site-header__links-search">
<img class="search-icon" src="<?php echo get_template_directory_uri(); ?>/img/search.svg" alt="Search Icon"/>
<div class="nav-search-form"><?php get_search_form();?></div>
</div>
</li>
<?php if ( is_user_logged_in() ) { ?>
  <a style="border:none;" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>"><li class="header-right-menu__item"></li><img class="profile-icon" src="<?php echo get_template_directory_uri(); ?>/img/user.svg"/></a>
<?php } else { ?>
  <a class="login-btn" style="border:none;" href="<?php echo wp_login_url();?>"><li class="header-right-menu__item"></li>Log In</a>
<a class="login-btn" style="border:none" href="<?php echo site_url('/wp-login.php?action=register');?>"><li class="header-right-menu__item"></li>Register</a>
<?php }; ?>


   <a style="border:none;" href="<?php echo wc_get_cart_url(); ?>">
   <li class="header-right-menu__item"></li><img class="shopping-bag" src="<?php echo get_template_directory_uri(); ?>/img/shopping-bag.svg"/><span class="cart_items_num"><?php echo sprintf ( _n( '%d ', '%d ', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?></span></a>
</ul>
<img class="hamburger-menu" src="<?php echo get_template_directory_uri(); ?>/img/hamburger-menu.svg" alt="Hamburger Menu Icon"/> 
 </nav>
			<!-- RIGHT MENU -->

<!-- mobile menu -->
<div class="menu-overlay-container">
<div class="mobile-margins">
<div class="mobile-menu-container__header">
<a href="<?php echo site_url();?>"><img class="mobile-logo logo" src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Veganease Logo"/></a>
<img class="close-btn" src="<?php echo get_template_directory_uri(); ?>/img/close.svg" alt="Close Button Icon"/>
</div> <!-- mobile menu container header -->
<div class="mobile-menu-container">
<nav class="mobile-navigation">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-3',
					'menu_id'        => 'third-menu',
				)
			);
			?>
			<ul class="header-right-menu">
   <?php if ( is_user_logged_in() ) { ?>
  <a style="border:none;" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>"><li class="header-right-menu__item"></li><img class="profile-icon" src="<?php echo get_template_directory_uri(); ?>/img/user.svg"/></a>
<?php } else { ?>
  <a class="login-btn" style="border:none;" href="<?php echo wp_login_url();?>"><li class="header-right-menu__item"></li>Log In</a>
  <a class="login-btn" style="border:none" href="<?php echo site_url('/wp-login.php?action=register');?>"><li class="header-right-menu__item"></li>Register</a>
<?php } ?>

   <a style="border:none;" href="<?php echo wc_get_cart_url(); ?>">
   <li class="header-right-menu__item"></li><img class="shopping-bag" src="<?php echo get_template_directory_uri(); ?>/img/shopping-bag.svg"/><span class="cart_items_num"><?php echo sprintf ( _n( '%d ', '%d ', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?></span></a>
</ul>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <label>
      <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Find Something!', 'placeholder' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
  </label>
  <button type="submit" name="submit" value="submit"></button>
</form>


		</nav><!-- #site-navigation -->
</div> <!-- mobile menu container -->
</div> <!-- mobile margins -->
</div> <!-- menu overlay container -->




<!-- mobile menu -->





				
	</header><!-- #masthead -->

