SASS=./node_modules/.bin/node-sass

ALL: sass
sass:
	$(SASS) css/olian.sass css/olian.css
zip:
	zip site.zip bower_components/* css/* js/* img/* node_modules/* index.html favicon.ico
