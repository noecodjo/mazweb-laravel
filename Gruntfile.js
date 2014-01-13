module.exports = function(grunt) {
    grunt.initConfig({

        // task configuration
        requirejs: {
            compile: {
                options: {
                   mainConfigFile: './public/assets/main.js',
                       baseUrl: "bower_components",
                       name: "main",
                       include: ['main'],
                       out: './public/assets/js/main.min.js'
                }
            }
        },
        /*
        less: {
            development: {
                options: {
                    compress: true // minifying the result
                },
                files: {
                    "./public/assets/css/frontend.css": "./bower_components/mazweb/css/frontend.less", //compiling frontend.less into frontend.css
                    "./public/assets/css/backend.css": "./bower_components/mazweb/css/backend.less" //compiling backend.less into backend.css
                }
            }
        }, */
        compass: {
            dist: {
                options: {
                    config: './config.rb'
                }
            }
        },
        concat: {
            options: {
                separator: ';'
            },
            js_build: {
                src: './public/assets/main.js',
                dest: './public/assets/js/main.js'
            }
        },
        uglify: {
            options: {
                mangle: false  // Use if you want the names of your functions and variables unchanged
            },
            buildfile: {
                files: {
                    './public/assets/js/main.js': './public/assets/js/main.js'
                }
            }
        },
        phpunit: {
            classes: {
                dir: 'app/tests/'   //location of the tests
            },
            options: {
                bin: 'vendor/bin/phpunit',
                colors: true
            }
        },
        watch: {
            js_build: {
                files: [
                    // watched files
                    './public/assets/main.js'
                ],
                tasks: ['concat:js_build','uglify:buildfile']     //tasks to run
            },
            /*
            less: {
                files: ['./app/assets/css/*.less'],  //watched files
                tasks: ['less'],                          //tasks to run
                options: {
                    livereload: true                        //reloads the browser
                }
            }, */
            compass: {
                files: ['./bower_components/mazweb/css/*.scss'],
                tasks: ['compass']
            },
            tests: {
                files: ['app/controllers/*.php','app/models/*.php'],  //the task will run only when you save files in this location
                tasks: ['phpunit']
            }
        }
    });

    // plugin loading
    grunt.loadNpmTasks('grunt-contrib-requirejs');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-compass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    // grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-phpunit');

    // task definition
    grunt.registerTask('default', ['watch']);
};