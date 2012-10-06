kirby-minigallery
=================

A small kirbytext extension to generate little fancybox galleries with thumbnails on the fly.

## Requirements

You need to have the [Thumb plugin](https://github.com/bastianallgeier/kirbycms-extensions/tree/master/plugins/thumb) in your plugin folder. Otherwise, this plugin won't work.

You have to include jQuery and [FancyBox](http://fancyapps.com/fancybox/) in your site.

Then, all you have to do is to copy the `kirbytext.extended.php` in your plugin directory.

## Usage

First of all, you need to initialize the fancy box in a way like this:

 	<script type="text/javascript">
		$(document).ready(function() {
			$(".fancybox").fancybox({
				prevEffect : 'fade',
				nextEffect : 'fade'
			});
		});
	</script>

You can create a simple gallery with a kirby tag in your text file like this:

	(minigallery:01.jpg|02.jpg|03.jpg)

If you want to specify some titles, you can do it like this: 

	(minigallery:01.jpg|02.jpg|03.jpg titles:foo|bar|title)

If you want to have more than one gallery and don't want them to be connected through the fancybox, you can specify another `rel` like this:

	(minigallery:01.jpg|02.jpg|03.jpg rel:first)
	(minigallery:01.jpg|02.jpg|03.jpg rel:second)

To disable the link to the original you can set `fancybox:false`.

For a custom CSS class use `class:classname`.

The rest of the available options relate to the Thumb plugin. So it is possible to set the maximum width and height like this: `width:240` and `height:320`.
