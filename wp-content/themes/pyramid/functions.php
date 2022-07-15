<?php
/**
 * Theme set up. Should be included first.
 */
require('includes/template-setup.php');

/**
 * Load custom filters and hooks.
 */
require('includes/template-hooks.php');

/**
 * WordPress hardening.
 */
require('includes/template-security.php');

/**
 * Load styles and scripts.
 */
require('includes/template-scripts.php');

/**
 * Custom template tags for this theme.
 */
require('includes/template-tags.php');

/**
 * Load template shortcodes.
 */
require('includes/template-shortcodes.php');

/**
 * Template ACF setup.
 */
require('includes/template-acf.php');

/**
 * Load template optimization.
 */
require('includes/template-optimization.php');