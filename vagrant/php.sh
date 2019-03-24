#!/bin/bash
#author Piusha kalyana piushakalyana@gmail.com

sudo apt-get update && sudo apt-get upgrade

echo "Installing php.."

echo "Install php modules"
sudo apt-get install -y php-pear php7.2-curl php7.2-dev php7.2-gd php7.2-mbstring php7.2-zip php7.2-mysql php7.2-xml php7.2-fpm

sudo apt-cache search --names-only ^php



