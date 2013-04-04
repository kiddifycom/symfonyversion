#Basic Vagrant Repository

This should be your starting point for your fancy new project here at Delodi. This repository contains only a very bare bones version of a Vagrant box running x64 Ubuntu 12.04 LTS with a basic LAMP stack installed.

Only a handful of things are actually being installed on the machine and you can remove them or switch them around pretty much at will. The packages being installed are the following:

+ mysql-client
+ mysql-server-5.5
+ apache2
+ php5
+ libapache2-mod-php5
+ php-apc
+ php5-mysql
+ php5-dev
+ openssl
+ php-pear
+ sendmail
+ libcurl4-openssl-dev
+ pecl_http (using PECL)

It also enables mod_rewrite and mod_ssl using a2enmod. All of these installation instructions and a few more details can be found in the bootstrap.sh file in the /conf folder.

You should place the files that you intend to serve in the /public folder within this repository. Additionally, use the /conf folder to store all the configuration files (for apache, php, mysql, etc.) that need to be changed and update the bootstrap.sh file to make sure that they get copied to the correct destination within the virtual machine.

To run the virtual machine, you just need to cd into the root directory of this repository and run:

```
vagrant up
```
Which will download the Ubuntu image (if you haven't downloaded it before), boot, update and start your machine. If everything goes well you should be able to access your machine on the default address and port (as defined in Vagrantfile):
 
```
http://localhost:8080/
``` 
For more details regarding this setup please visit the [page in Confluence](http://example.com/ "Development Process").