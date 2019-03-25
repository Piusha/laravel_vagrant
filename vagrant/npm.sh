#!/usr/bin/env bash

sudo apt-get update -y
sudo apt-get install -y build-essential curl git libssl-dev man mongodb-clients

git clone https://github.com/creationix/nvm.git ~/.nvm && cd ~/.nvm && git checkout `git describe --abbrev=0 --tags`
echo "source ~/.nvm/nvm.sh" >> ~/.profile
source ~/.profile
source ~/.profile

nvm install v10.10.0
nvm alias default v10.10.0


