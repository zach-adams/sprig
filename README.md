[Sprig Wordpress Starter Theme](http://sprigwp.com/)
=========

Create themes quicker and easier then ever before with the incredible power of Twig's PHP Templating Engine. Built off of [underscore](https://github.com/Automattic/_s/), [Roots](https://github.com/roots/roots), and [Twigpress](https://wordpress.org/plugins/twigpress/) Sprig has tons of functions and useful Wordpress features essential to any theme.

Special Thanks to [Mike Shaw](https://profiles.wordpress.org/mikeshaw217/), the Team at [Roots](http://roots.io), and the creators of [underscore](https://github.com/Automattic/_s) for making the Twigpress Wordpress Plugin, the Roots Starter Theme and the _s Theme respectively.

## Features

* [Twig Templating Engine](http://twig.sensiolabs.org/)
* [Gulp](http://gulpjs.com/) for SASS compiling, file concatination, image minifying, javascript uglifying, and livereload
* [Bower](http://bower.io/) for front-end package management
* [Bootstrap](http://getbootstrap.com/)
* HTML5 Ready
* Tons of useful functions and theme activation thanks to [Roots](https://github.com/roots/roots)

## Installing

1. Clone this repo - `git clone git@github.com:zach-adams/sprig.git` or [download the zip file](https://github.com/zach-adams/sprig/archive/master.zip) and install it like a normal Wordpress theme.
2. Go to the theme directory and run `sudo npm install` or `npm install`
3. Run `bower install` to install dependencies
4. Run `gulp dev` to compile the initial css and js or just `gulp` to compile initial css and js and then run watch task
5. Run `gulp build` when you're ready for your assets to be concatinated and minified

## Theme Development

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
|   +-- extras.php - Some extra functions and important Twig Wordpress helper functions
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
|	|	+-- components/ - Wordpress Specific code, tables, buttons, etc.
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

## What's Twig and why use it??

Twig is a flexible, fast, and secure template engine for PHP. It allows developers to write and structure their themes quickly and understandably. 

With Twig instead of writing:

```php
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    	<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
	<?php endwhile; else: ?>
    	<p>Nothing here</p>
	<?php endif; ?>
```

We can use:

```php
    {% for post in posts %} {{ wp.the_post }}
        <a href="{{ wp.the_permalink }}">{{ wp.the_title }}</a>
    {% endfor %}
    {% if posts is empty %}
        <p>Nothing here</p>
    {% endif %}
```

See more in the wiki!

## How is Blade used in this theme?

When the theme is loaded it attaches itself to the template loader and runs the template specified through the nifty Blade Engine included. You'll notice all the the regular theme development files you'd expect are in their default locations (single.php, page.php, etc.), however if we look at page.php, they look pretty weird:

```php
@layout( 'templates.layouts.normal' )

@section('page-content')

	@include('templates.content.page')

@endsection
```

The **Layout** tag is telling Blade to look in the templates/layouts/ for a file called **normal.blade.php**. All forward slashes can be replaced by a period for better readability. 

If we look in the **normal.blade.php** file we find that there's another **Layout** tag telling Blade to load **base.blade.php**. 

The Base Layout is the basic structure of your HTML. It includes the Head file, sets the Body tag, includes the Header, wraps the content in a div, includes the footer, and ends the HTML document. The Base Layout is used everytime you call a template.

You'll see in the middle of the **base.blade.php** there's a tag called @yield('content') which is telling this layout to allow other Blade files to put content there. If we go back to **normal.blade.php** you can see the tag @section('content'). What this is telling Blade is that we want to put the 'content' in **normal.blade.php** into the @yield('content') section in base.blade.php.

You can also see another yield inside of **normal.blade.php**. Why do this? Excellent question. Normal.blade.php is meant to be exactly that. A normal layout. It's how you'd style a typical page in Wordpress. Full-width.blade.php is meant to be a full-width template. Duh. If we look inside it there's no 'container' div which normally sets the width and centers the content. Sidebar.blade.php is a page with a sidebar. See, there's nothing too difficult about it!

Back to the yield inside of **normal.blade.php**. If we go back to **page.php** you can see the 'page-content' section links to templates/content/ and a file called front-page.blade.php. The **Content** folder is where you'll put all your main content such as Default Pages, Single Posts, Front Page, and Index.

That just leaves the **Includes** folder. In here you'll find the various includes the template needs to function such as the Header and the Footer.

That's just about it! Let me know if you have any questions and I'll be sure to answer them! [zach.adams383@gmail.com](mailto:zach-adams383@gmail.com)

## Issues

See the Wiki for current known issues


```php
{% extends 'layouts/base.twig' %}

{% block content %}
    {% set posts = wp.newLoop({
        'orderby':'name',
        'order':'ASC'
    }) %}
    {% for post in posts %}{{ wp.newPostData(post) }}
        {% include 'content/content-excerpt.twig' %}
        <hr/>
    {% endfor %}
    {% include 'includes/paging.twig' %}
{% endblock %}
```