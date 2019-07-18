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
            }
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
        }
    });

    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.registerTask('default', ['concat', 'uglify', 'cssmin', 'copy:fonts']);
};