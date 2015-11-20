/**
 * @file
 *   Adds main javascript functionality to the website
 *
 * @author
 *   Tijs De Boeck - Open Up Media - www.openupmedia.be
 *
 * ------------------------------------------------------------------------- */

(function ($) {
  $(document).ready(function(e) {

    // create path to our theme js & img folders, using the
    // drupal.settings var set in template_preprocess.php
    jsdir = Drupal.settings.path_to_theme + '/assets/js';
    imgdir = Drupal.settings.path_to_theme + '/assets/img';


    /**
     * Menu
     * ------------------------------------------------------------ */
    // Show the menu on toggler click
    $('.menu-toggle').click(function(e){
      e.preventDefault();
      $('.nav-block-1').toggleClass('menu-visible');
      $(this).toggleClass('active');
    });

    // Prepend nav arrow on menu items that have submenus
    $('.menu-item--parent').prepend('<span class="subnav-toggle"></span>');

    // Show the submenu when nav is clicked
    $('.subnav-toggle').click(function(e){
      var $this = $(this);
      // add active class to the toggler & parent li,
      // and make sure it's removed from all other siblings
      $this.toggleClass('toggle-active');
      $this.parent('.menu-item--parent').toggleClass('subnav-active').siblings().removeClass('subnav-active');
    });


    /**
     * Placeholder polyfill
     * ------------------------------------------------------------ */
    if (!Modernizr.input.placeholder) {
      $.ajax({
        url: jsdir + '/vendor/placeholder/jquery.placeholder.min.js',
        dataType: 'script',
        cache: true
      }).done(function() {
        $('input, textarea').placeholder();
        //console.log('placeholder polifill loaded');
      });
    }


    /**
     * svg > png fallback (only for imags with .svg class)
     * ------------------------------------------------------------ */
    if (!Modernizr.svg) {
      //$('img[src$=svg]').each(function(index, item) {
      $('img.svg').each(function(index, item) {
        imagePath = $(item).attr('src');
        $(item).attr('src',imagePath.slice(0,-3)+'png');
      });
    }


    /**
     * IE8 & lower fixes
     * ------------------------------------------------------------ */
    if($('html').hasClass('lt-ie9')) {
      // Lazysizes workaround:
      // get the data-srcset, and use it as src in IE8 & lower
      $('img.lazyload').each(function () {
          var $this = $(this);
          if($this.data('srcset')){
              var res = /(?:([^"'\s,]+)\s*(?:\s+\d+[wx])(?:,\s*)?)+/g.exec($this.data('srcset'))
              $this.attr('src', res[res.length-1]);
          } else {
              $this.attr('src', $this.data('src'));
          }
      });
    }

    /* ----- The end ----- */

	});
})(jQuery);
