#!/bin/bash
#author Piusha kalyana piushakalyana@gmail.com

if [ ! -e /etc/nginx ]
then

	echo ">>> setting up nginx"

	# install nginx
	sudo apt-get install -y nginx

	sudo rm /etc/nginx/sites-enabled/default
	# update the default vhost
	sudo ln -s /laravel/vagrant/templates/laravel.xyz.conf /etc/nginx/sites-enabled/

	# restart nginx so it can pick up the new configuration
	sudo service nginx restart

else

	echo ">>> nginx already setup..."

fi