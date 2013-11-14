# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
  # Use our base ubuntu box
  config.vm.box = "ubuntu-precise64"
  config.vm.box_url = "http://files.vagrantup.com/precise64.box"

  config.vm.network :private_network, ip: "10.11.12.16", netmask: "255.255.0.0"

  # Install the neccessary packages and update the VM
  config.vm.provision :shell, :path => "conf/bootstrap.sh"

   # Set the ownership of our public folder to www-data
  config.vm.synced_folder "./public", "/var/www", :owner => "www-data", :group => "www-data", :mount_options => ['dmode=775,fmode=774']
 
  config.vm.provider "virtualbox" do |vb|
    vb.customize ["modifyvm", :id, "--memory", "1024"]
  end
end
