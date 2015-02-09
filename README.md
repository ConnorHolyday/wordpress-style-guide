The Idea Bureau - WordPress Style Guide
=======================================

This WordPress plugin allows our style guide functionality to work within WordPress.

## Installation

- Install and activate this plugin
- Add the following code to your theme `.htaccess` file, above the WordPress rules

	# BEGIN Styleguide
	<IfModule mod_rewrite.c>
	RewriteEngine on
	RewriteCond %{REQUEST_FILENAME} !-d
	RewriteCond %{REQUEST_FILENAME} !-f
	RewriteRule ^styleguide(/|$) wp-content/plugins/theideabureau-	styleguide/plugin.php [L]
	</IfModule>
	# END Styleguide