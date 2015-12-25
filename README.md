Scotch Box - mjp.one mod
========================

## Based on [Scotch box](https://github.com/scotch-io/scotch-box)
This is just a script mod, *scotch/box* vm box is used.

# What includes
- Multi-vhost configurator
- SSH folder is copied on vagrant provision
- Added memory and cpu configuration to Vagrantfile

# Before vagrant up
## Set sync folder
Replace */vagrant/public* by web root path on Vagranfile
```ruby
config.vm.synced_folder "/vagrant/public", "/var/www", :mount_options => ["dmode=777", "fmode=666"]
```

## Set ram memory and CPUs
```ruby
config.vm.provider "virtualbox" do |v|
    v.memory = 2048
    v.cpus = 2
end
```

## Create public folder
Default virtual host is poiting to *public* folder in synced folder.

You can access by ip (192.168.68.10 default ip) or scotchbox.local domain.

# Configurator

## Add virtual hosts
- Edit mjp.one/configurator/config.php
- Run ``vagrant provision`` to update

## Add files to SSH folder
- Copy files to .ssh folder
- Run ``vagrant provision`` to update