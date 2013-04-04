# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant::Config.run do | config |
  # Use our base ubuntu box
  config.vm.box = "ubuntu-precise64"
  config.vm.box_url = "http://files.vagrantup.com/precise64.box"

  # Forward port 8080 on the host to port 80 on the VM
  config.vm.forward_port 80, 8080

  # Install the neccessary packages and update the VM
  config.vm.provision :shell, :path => "conf/bootstrap.sh"
end
