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

   # Set the ownership of our public folder to www-data
  config.vm.share_folder("public", "/vagrant/public", "./public", :owner => "www-data", :group => "www-data")
end
