var gulp = require('gulp');

// include plug-ins
var jshint = require('gulp-jshint');
var concat = require('gulp-concat');
var stripDebug = require('gulp-strip-debug');
var uglify = require('gulp-uglify');
var autoprefix = require('gulp-autoprefixer');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var autoprefixer = require('gulp-autoprefixer');
var header = require('gulp-header');

// options
var sassOptions = {
  errLogToConsole: true,
  outputStyle: 'compressed' //expanded, nested, compact, compressed
};
var autoprefixerOptions = {
  browsers: ['last 2 versions', '> 5%', 'Firefox ESR']
};


// JS concat, strip debugging and minify
gulp.task('scripts', scripts);

function scripts(done) {
    
  var banner = ['// Gulp compiles scripts and puts them here.',''].join('\n');
    
  gulp.src('./src/js/*.js')
    .pipe(jshint(done))
    .pipe(jshint.reporter('default'));
	gulp.src('./src/js/*.js')
    .pipe(concat('scripts.built.js'))
    //.pipe(stripDebug())
    //.pipe(uglify())
    .pipe(header(banner))
    .pipe(gulp.dest('./js/'));
    
	done();
 // console.log('scripts ran');
}

// CSS concat, auto-prefix and minify
gulp.task('styles', styles);

function styles(done) {

	var pkg = require('./package.json');
	var banner = ['/*',
  'Theme Name: <%= pkg.name %>',
  'Theme URI: <%= pkg.homepage %>',
  'Author: URI',
  'Author URI: https://today.uri.edu',
  'Description: Theme for URI websites',
  'Version: <%= pkg.version %>',
  'License: GNU General Public License v2 or later',
  'License URI: http://www.gnu.org/licenses/gpl-2.0.html',
  'Text Domain: uri-department',
  'Tags: education',
  '',
  '*/',
  '/**',
  '@version v<%= pkg.version %>',
  '@author <%= pkg.author1 %>',
  '@author <%= pkg.author2 %>',                
  '',
  '*/',
  ''].join('\n')


	gulp.src('./src/sass/*.scss')
		.pipe(sourcemaps.init())
		.pipe(sass(sassOptions).on('error', sass.logError))
		.pipe(autoprefixer(autoprefixerOptions))
		.pipe(concat('style.css'))
		.pipe(header(banner, { pkg : pkg } ))
		.pipe(sourcemaps.write('./map'))
		.pipe(gulp.dest('.'));

  done();
  //console.log('styles ran');
}

// watch
gulp.task('watcher', watcher);

function watcher(done) {
	// watch for JS changes
	gulp.watch('./src/js/*.js', scripts);

	// watch for CSS changes
	gulp.watch('./src/sass/*.scss', styles);

	done();
}

gulp.task('default',
	gulp.parallel('scripts', 'styles', 'watcher', function(done){
		done();
	})
);


function done() {
	console.log('done');
}