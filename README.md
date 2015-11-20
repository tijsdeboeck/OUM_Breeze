# OUM Breeze start theme for Drupal 7

Breeze is the [Open Up Media](http://www.openupmedia.be) D7 start theme.
We started on this years ago, but recently updated it, including clever bits from other themes (look at the credits below).


## This theme contains the following features

*   Mobile first approach.
*   Integrated nested responsive navigation.
*   Sass integration
*   No grid integration. Make or integrate your own if needed.
*   [Modernizr](http://modernizr.com) 3 support.
*   No cruft. This theme gets rid of some Drupal default css, and only includes a bare minimum of gui theming stuff. Use this as a starting point, to build your own theme
*   We've tried to keep the css specificity as low as possible.


## How to use the OUM Breeze start theme

This theme is not meant to be used as a base theme. Instead, rename and edit it directly. Any upgrades will **not** be backwards compatible.

1.  Edit the directory name to fit your theme name.
2.  Edit the _.info_ filename to _&lt;themename&gt;.info_.
3.  Change all function names in the _template-*.php_ files to your theme name.
4.  Modify the contents of your _&lt;themename&gt;.info_ file to suit its new name.
5.  Delete change this _README.md_ file.
6.  Theme away...


## Notes

*   This theme should work in all browsers, except IE7 &amp; below
*   We add all our css & js files via template-preprocess.php, instead of using the .info for this.


## Useful references &amp; Drupal modules

*   [Views Custom Style](https://www.drupal.org/sandbox/openupmedia/2588387) module - A module we build to have total control over the views output
*   [Sassy](https://www.drupal.org/project/sassy) module - for SASS to CSS compilation
*   [Favicon cheat sheet](https://github.com/audreyr/favicon-cheat-sheet) by audreyr


## Acknowledgements &amp; Credits

### Contributors

*   Tijs de Boeck [Github](https://github.com/tijsdeboeck), [Drupal](https://www.drupal.org/u/tijsdeboeck)
*   Thomas Torfs [Github](https://github.com/thomastorfs), [Drupal](https://www.drupal.org/u/elphaenax)
*   Wim De Herdt [Drupal](https://www.drupal.org/u/wimdeherdt)

### Bits & pieces
We used bits & pieces from several other themes and snippets we found. These are the some we remember, in random order.

*   [Bastard theme](https://github.com/mherchel/bastard) by Michael Herchel
*   [Wundertheme](https://github.com/Wunderkraut-Benelux/wundertheme) by Wunderkraut
*   [Atlas Theme](https://github.com/friendlymachine/a-d7) by Friendly Machine
