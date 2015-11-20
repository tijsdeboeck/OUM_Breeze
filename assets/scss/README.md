# FOLDER STRUCTURE

global
Contains all the global stuff, like fonts, colors, breakpoints, custom mixins, and other variables variables. Is loaded first in the stylesheet through global/_init.scss.

components
Contains all project css stuff
  components/base       all general css, like body, p, a, h*, table, etc
  components/layout     defines the layout & structure of the site, like header, wrappers, footer, etc
  components/forms      all form component styling
  components/nav        all navigation styling
  components/misc       some standard miscellaneous components, like messages, pagination, breadcrumbs, etc
  components/general    define the styling for generally used components here, like header & footer styling, page titles, etc
  components/specific   define the styling for specific / single-use components here, like a specific view or block, and other things that deviate from the general styling
  components/ie-legacy  Specific hacks for older IE versions

polyfills
Contains .htc polyfills for older browsers, if needed. By default, we have 2 polyfills here that can be added using a mixin for backgroundsize & boxsizing

vendor
(s)css files from other vendors, like normalize.scss


# WHEN STARTING A NEW PROJECT

1.  Set the global stuff, like colors, font, breakpoints, etc (global/*.scss)
2.  Set the basic css stuff (components/base.scss)
3.  Start with the basic layout (components/layout.scss)
4.  Add the default theming for header, footer, nav, breadcrumbs, etc (components/*.scss )
5.  Add IE legacy stuff if needed (components/ie-legacy.scss)
6.  Keep your code maintainable!


# WHEN THROWN IN TO THIS PROJECT

*   Determine the nature of the changes, and look for the corresponding files
*   Avoid changing styles
*   If you are changing a style, be sure to check wherever the style is used
*   Be aware of the consequences when you change global things
    *   colors
    *   variables


# GOING TO PRODUCTION

Make sure everything is properly compiled to css, concatenated, and minified!
