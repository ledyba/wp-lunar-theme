.PHONY: deploy

deploy:
	rsync -auz --delete -e ssh . 7io.org:/opt/www/7io.org/wp/wp-content/themes/wp-lunar-theme/
