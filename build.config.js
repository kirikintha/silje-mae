/**
 * This file/module contains all configuration for the build process.
 */
module.exports = {
  /**
   * The `build_dir` folder is where our projects are compiled during
   * development and the `compile_dir` folder is where our app resides once it's
   * completely built.
   */
  js_build_dir: 'public/lib',
  css_build_dir: 'public/lib',

  /**
   * All Vendor files that will be copied to the public vendor directory
   */
  vendor_files: {
    js: [
      'bower_components/angular/angular.min.js',
      'bower_components/angular-animate/angular-animate.min.js',
      'bower_components/angular-resource/angular-resource.min.js',
      'bower_components/angular-route/angular-route.min.js',
      'bower_components/bootstrap/dist/js/bootstrap.min.js',
      'bower_components/dotjem-angular-tree/dotjem-angular-tree.min.js',
      'bower_components/jquery/dist/jquery.min.js',
      'bower_components/ng-lodash/build/ng-lodash.min.js',
      'bower_components/slick-carousel/slick/slick.min.js',
      'bower_components/angular-slick/dist/slick.js'
    ],
    css: [
        'bower_components/slick-carousel/slick/slick.css',
        'bower_components/slick-carousel/slick/slick-theme.css'
    ]
  }
};
