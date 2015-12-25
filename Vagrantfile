# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|

    config.vm.box = "scotch/box"
    config.vm.network "private_network", ip: "192.168.69.10"
    config.vm.hostname = "scotchbox-mjp.one-mod"
    config.vm.synced_folder "./websites", "/var/www", :mount_options => ["dmode=777", "fmode=666"]

    # Optional NFS. Make sure to remove other synced_folder line too
    #config.vm.synced_folder ".", "/var/www", :nfs => { :mount_options => ["dmode=777","fmode=666"] }

    config.vm.provider "virtualbox" do |v|
        v.memory = 2048
        v.cpus = 2
    end

    config.vm.provision "shell", inline: <<-SHELL

        echo "Copying .ssh directory"
        sudo -u vagrant cp -R /vagrant/mjp.one/.ssh /home/vagrant/
        sudo -u vagrant chmod 600 /home/vagrant/.ssh/id_rsa*

        echo "Running configurator"
        php /vagrant/mjp.one/configurator/configurator.php

    SHELL

end
