module.exports = function(grunt) {
    const css = [
        'node_modules/bootstrap/dist/css/bootstrap.css',
        'node_modules/@fortawesome/fontawesome-free/css/all.css',
        'style.css',
    ];
    const js = [
        'node_modules/jquery/dist/jquery.js',
        'node_modules/popper.js/dist/umd/popper.js',
        'node_modules/bootstrap/dist/js/bootstrap.js',
        'node_modules/jquery.easing/jquery.easing.js',
        'script.js',
    ];
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        concat: {
            options: {
                sourceMap: true,
                banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n'
            },
            css: {
                src: css,
                dest: 'css/swiftion.css'
            },
            js: {
                src: js,
                dest: 'js/swiftion.js'
            }
        },
        uglify: {
            options: {
                sourceMap: true,
                sourceMapIncludeSources: true,
                banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n'
            },
            dist: {
                src: ['js/swiftion.js'],
                dest: 'js/swiftion.min.js'
            }
        },
        cssmin: {
            options: {
                sourceMap: true
            },
            target: {
              files: [{
                expand: true,
                src: ['css/swiftion.css'],
                dest: './',
                ext: '.min.css'
              }]
            }
        },
        copy: {
            fonts: {
                files: [
                    {
                        expand: true, 
                        cwd: 'node_modules/@fortawesome/fontawesome-free/webfonts/',
                        src: ['**/*'],
                        dest: 'webfonts/'
                    }
                ]
            },
            build: {
                src: ['**', '!build/**', '!node_modules/**', '!gruntfile.js', '!package.json', '!package-lock.json'],
                dest: 'build/',
            },
        },
        watch: {
            css: {
                files: ['style.css'],
                tasks: ['concat:css', 'cssmin']
            },
            js: {
                files: ['script.js'],
                tasks: ['concat:js', 'uglify']
            }
        },
        clean: {
            build: {
                src: ['build/']
            }
        },
        version: {
            css: {
                options: {
                    prefix: 'Version\\:\\s'
                },
                src: ['style.css']
            },
            // php: {
            //     options: {
            //         prefix: '\@version\\s+'
            //     },
            //     src: [ 'functions.php' ]
            // },
        },
        gitcommit: {
            version: {
                options: {
                    message: 'new version: <%= pkg.version %>'
                },
                files: {
                    src: ['style.css', 'package.json']
                }
            }
        },
        gittag: {
            version: {
                options: {
                    tag: 'v<%= pkg.version %>',
                    message: 'tagging version <%= pkg.version %>'
                }
            }
        },
        gitpush: {
            version: {},
            tag: {
                options: {
                    tags: true
                }
            }
        },
        compress: {
            build: {
                options: {
                    archive: 'build/<%= pkg.name %>.<%= pkg.version %>.zip'
                },
                expand: true,
                cwd: 'build/',
                src: ['**/*'],
                dest: '<%= pkg.name %>/'
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-compress');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-git');
    grunt.loadNpmTasks('grunt-version');

    grunt.registerTask('default', ['concat', 'uglify', 'cssmin', 'copy:fonts']);
};