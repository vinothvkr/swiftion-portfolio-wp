<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>

<body <?php body_class('blog'); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'swiftionportfolio' ); ?></a>
	<nav class="navbar navbar-expand-xl fixed-top swiftion-navbar">
        <div class="container">
            <a class="navbar-brand" href="#">Swiftion</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="/#header">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="/#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="/#service">Service</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll active" href="/blog/">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="/#contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

	<div id="content" class="site-content">
