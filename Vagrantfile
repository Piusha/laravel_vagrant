# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|

    config.vm.box = "bento/ubuntu-18.04"
    config.vm.define "lv_test"
	config.vm.network :private_network, ip: '192.168.20.153'

	config.vm.synced_folder ".", "/laravel", :owner=> 'root', :group=>'root', :mount_options => ['dmode=777', 'fmode=777']

    config.vm.provision :shell, :path => "./vagrant/php.sh"
	config.vm.provision :shell, :path => "./vagrant/nginx.sh"
	config.vm.provision :shell, :path => "./vagrant/composer.sh"

    config.vm.provider :virtualbox do |vb|
        vb.customize ["setextradata", :id, "VBoxInternal2/SharedFoldersEnableSymlinksCreate/v-root", "1"]
        vb.customize ["modifyvm", :id, "--memory", "2048"]
		vb.name = "lv_test"
    end
end