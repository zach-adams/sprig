[Sprig WordPress Starter Theme](http://sprigwp.com)
=========

Create themes quicker and easier than ever before with the incredible power of Twig's PHP Templating Engine. Built off of [underscore](https://github.com/Automattic/_s/), [Roots](https://github.com/roots/roots), and [Twigpress](https://wordpress.org/plugins/twigpress/), Sprig has tons of functions and useful WordPress features essential to any theme.

By default Sprig comes with Bootstrap, looking for the Foundation version? [It's right here!](https://github.com/zach-adams/sprig-foundation)

Special Thanks to [Mike Shaw](https://profiles.wordpress.org/mikeshaw217/), the Team at [Roots](http://roots.io), and the creators of [underscore](https://github.com/Automattic/_s) for making the Twigpress WordPress Plugin, the Roots Starter Theme and the _s Theme respectively.

## Features

* [Twig Templating Engine](http://twig.sensiolabs.org/)
* [Gulp](http://gulpjs.com/) for SASS compiling, file concatination, image minifying, javascript uglifying, and livereload
* [Bower](http://bower.io/) for front-end package management
* [Bootstrap](http://getbootstrap.com/)
* HTML5 Ready
* Tons of useful functions and theme activation thanks to [Roots](https://github.com/roots/roots)

## Installing

1. Clone this repo - `git clone git@github.com:zach-adams/sprig.git` or [download the zip file](https://github.com/zach-adams/sprig/archive/master.zip) and install it like a normal WordPress theme.
2. Go to the theme directory and run `sudo npm install` or `npm install`
3. Run `bower install` to install dependencies
4. Run `gulp dev` to compile the initial css and js or just `gulp` to compile initial css and js and then run watch task
5. Run `gulp build` when you're ready for your assets to be concatinated and minified

## What's Twig and why use it??

Twig is a flexible, fast, and secure template engine for PHP. It allows developers to write and structure their themes quickly and understandably. 

Here's the WordPress loop in Twig:

```php
    {% for post in posts() %} {{ the_post(post) }}
        <a href="{{ wp.the_permalink }}">{{ wp.the_title }}</a>
    {% endfor %}
```

## How is Twig used in this theme?

Twig is loaded in the theme functions in the twigpress.php file in the inc/ directory. After it has been loaded the function `twigpress_render_twig_template` is available for us to use. If we look at all the top-level theme files you'll notice all they have in theme is that function. What that function does is tell WordPress to look into the twigs/ directory and find the equivalent filename except with .twig as an extension. It then tells WordPress that Twig will handle the rendering of this file.

## WordPress Function Arguments

You call functions like normal except with `wp` prepended to them like (wp.the_title) due to reasons explained in Caveats section. Functions can be called like normal:

```php
wp.comment_form_title('Leave a Reply', 'Leave a Reply to')
```

Or simply:

```php
wp.comment_form_title
```

If you need to give it an array as an argument you can like so:

```php
wp.get_comments({'post_id':wp.get_the_ID,'status':'approve'})
```

This equates to

```php
$args = array(
    'post_id'   =>  get_the_ID(),
    'status'    =>  'approve'
);
get_comments($args);    
```

**Note: Twig can not instantiate objects.** So I made a function to do it for you. You can make an object like so:

```php
wp.returnObject('sprig_Walker_Comment')

{{ wp.wp_list_comments({'walker':wp.returnObject('sprig_Walker_Comment')}, comments) }}
```

## WordPress Loop

You can access the WordPress loop with the `posts()` function. The `posts()` function without any arguments will return the original WordPress loop. Instead of using `the_post()` like normal you need to pass in the post object so it will setup correctly.

```php
{% for post in posts() %} {{ the_post(post) }}
    {{ wp.the_title }}
{% endfor %}
```

### WordPress Custom Loops

Instead of using an empty `posts` function you can pass in arguments like you would with [WP_Query](http://codex.wordpress.org/Class_Reference/WP_Query).

```php
{% for post in posts({
    'orderby':'name',
    'order':'ASC'}) %} {{ the_post(post) }}
    {% include 'content/content-excerpt.twig' %}
{% endfor %}
```

### Advanced Custom Field Repeater Loops

You can get Repeater loops like this:

```php
{% for row in wp.get_field('images') %}
    <h1>{{ row.title }}</h1>
    {{ wp.wp_get_attachment_image(row.image, 'full') }}
{% endfor %}
```

## Caveats

There's always a catch. There are some interesting hacks I had to include in order for Twig to play nice with WordPress. 

- **All Non-Twig functions must be preceded by 'wp'** (e.x. wp.the_title, wp.the_content, etc.). Normally in Twig you'd tell it which functions and variables you'd like to be able to use in the environment, however it would get tedious to add all the WordPress functions to the Twig Loader. So instead I added a proxy function `wp` which is just a wrapper for `call_user_func_array`. 
- **Some WordPress functions don't like to be echoed** (e.x. dynamic_sidebar). Instead you can just use Twig's [set](http://twig.sensiolabs.org/doc/tags/set.html) to not echo but still have the function run (e.x {% `set sidebar = dynamic_sidebar('primary') %}`)
- **Accessing Global Variables**. Twig does NOT like accessing global variables which WordPress relies on. Instead you'll have to make the global variables. I've already added two, `wp_query` for the wp_query global variable and `posts()` function which returns all the posts necessary for the WordPress loop to work. 

### Directory Structure

```
+-- dist/ - Distribution/Production files
|   +-- fonts/ - Font Files
|   +-- img/ - Images (images optimized by gulp in `gulp imagemin`)
+-- inc/ - Various helpful functions and Twig code. All included in function.php
|   +-- Twig/ - Twig Engine and init code
|   +-- activation.php - Code to run on theme activation
|   +-- comments.php - Custom comments walker optimized for Bootstrap
|   +-- config.php - Theme configuration options
|   +-- extras.php - Some extra functions and important Twig WordPress helper functions
|   +-- gallery.php - Cleans up the gallery shortcode and optimizes it for Bootstrap
|   +-- init.php - Code to run on theme init
|   +-- scripts.php - Scripts queueing
|   +-- titles.php - Better titles function (Thanks to _s!)
|   +-- twigpress.php - Loader for the Twig Engine
|   +-- utils.php - Utility functions
|   +-- wp_bootstrap_navwalker.php - Navwalker optimized for Bootstrap
+-- src/ - Development Files
|   +-- js/ - Javascript files
|   +-- sass/ - Default SASS directory
|	|	+-- base/ - Basic CSS styles for HTML, Typography, Colors, etc.
|	|	+-- components/ - WordPress Specific code, tables, buttons, etc.
|	|	+-- helpers/ - SASS helpers, variables, mixins, paths
|	|	+-- layout/ - Header, Footer, Navigation, Site, etc.
|	|	+-- pages/ - Page specific code (home, contact, etc.)
+-- vendor/ - Vendor files, bower installs here
+-- twigs/ - Twig templates go here
|   +-- content/ - Main content for the templates
|   +-- includes/ - Various includes
|   +-- layouts/ - Fundamental layouts of the templates
```

### Install Gulp and Bower

Install Gulp with `npm install -g gulp` and Bower with `npm install -g bower`

### Gulp Tasks

* `gulp dev` - Compiles SASS (without minification), concatinates CSS included with Bower (read in Bower section), copies main.js
* `gulp build` - Compiles SASS (with minifcation), concatinates and minifies CSS included with Bower (read in Bower section), copies main.js
* `gulp watch` - Watches src/ and dist/ folders for changes (as well as all PHP and Twig files) and triggers livereload when it detects one
* `gulp imagemin` - Minifies images in /dist/img
* `gulp` - Runs `gulp dev` then `gulp watch`

### Bower

Read more about bower [here](http://bower.io/). Bower installs to the vendor/ directory. 

#### How your dependencies are added to vendor.css/vendor.js

Gulp has a plugin called main-bower-files that can read the main files in each bower install, determining which one you're looking for from that. Most of it should happen automatically as you install Bower packages, however there may be times where you don't want packages included in the vendor.css or vendor.js or you wish to alter the files that are included by default. Here's how to do that. 

1. Open your bower.json
2. Add the "overrides" section like so:

```
{
  "overrides": {
    "BOWER-PACKAGE-NAME-GOES-HERE": {
    	"main": "**/*.js",
      	ignore": true
    }
  }
}
```
3. Put in the name of the Bower Package
4. **main** is the name of the Javascript files that are passed to Gulp to be minified, you can edit which one Bower chooses by default
5. **ignore**, if set to true, will set the package to be ignored by Gulp when it looks

## Bootstrap Navigation

This theme comes with the [Bootstrap Nav Walker](https://github.com/twittem/wp-bootstrap-navwalker) developed by [twittem](https://github.com/twittem/). Reference the [Github](https://github.com/twittem/wp-bootstrap-navwalker) page on how to make changes.

That's just about it! Let me know if you have any questions and I'll be sure to answer them! [zach.adams383@gmail.com](mailto:zach-adams383@gmail.com)

## Issues

**WARNING:** This is not even close to being in a stable place, I would **highly** not recommend using this in production yet as there are probably a lot of bugs I haven't found yet. 
