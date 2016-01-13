<?php
/**
 * Template Name: Plantilla volver a inicio
 * @package WordPress
 * @subpackage nmycia
 * @since nmycia 1.0
 */
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: ".get_bloginfo('url'));
	exit();
?>