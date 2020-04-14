/*
 * grunt-cli
 * http://gruntjs.com/
 *
 * Copyright (c) 2012 Tyler Kellen, contributors
 * Licensed under the MIT license.
 * https://github.com/gruntjs/grunt-init/blob/master/LICENSE-MIT
 */

'use strict';

module.exports = function(grunt) {

    grunt.initConfig({
        concat: {
            css: {
                src: ['assets/common/css/bootstrap/bootstrap.min.css', 
                      'assets/common/css/reset.css',
                      'assets/common/css/font-awesome.min.css',
                      'assets/common/fonts/fonts.css',
                      'assets/web/css/web.css'
                    ],
                dest: 'assets/web/css/main.css'
              },

            js: {
                src: ['assets/common/js/jquery.min.js', 
                      'assets/common/js/bootstrap/bootstrap.min.js',
                      'assets/common/js/marquee.min.js'
                    ],
                dest: 'assets/web/js/main.js'
              }
            },
        uglify: {
            js: {
                src: 'assets/web/js/main.js',
                dest: 'assets/web/js/main.min.js'
                }
            },
        cssmin: {
            css: {
                src: 'assets/web/css/main.css',
                dest: 'assets/web/css/main.min.css'
                }
            }
        });

    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.registerTask('build', ['concat', 'uglify', 'cssmin']);
};