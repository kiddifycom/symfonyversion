#Basic PHP Project Skelleton

##Introduction
This should be your starting point for your fancy new project here at Delodi. This repository contains the skeleton of a PHP project in a Vagrant box running x64 Ubuntu 12.04 LTS (precise) with a basic LAMP stack installed as default. It contains another Vagrantfile for Ubuntu 12.10 (quantal) with PHP 5.4, which shoud be used for future compatibaly reasons, at least for testing your application. But remember: it's a starting point. Do not commit changes you made for a custom project to this skeleton.

##Installed Packages

###BasePackages
+ mysql-client
+ mysql-server-5.5
+ apache2
+ php5
+ libapache2-mod-php5
+ openssl
+ php-pear
+ postfix
+ libcurl4-openssl-dev
+ libssl0.9.8
+ ant

###PHP Extensions
+ php-apc
+ php5-mysql
+ php5-dev
+ php5-xsl
+ php5-curl
+ php5-xdebug
+ pecl_http (using PECL)

###PHP Packages
+ Autoload - Autoloadgenerator
+ phpDox - Generates Doc
+ PHP_Depend - Measures Software Metrics
+ PHP_PMD - PHP Messdetector, detects potential Problems in Code
+ PHP_CodeSniffer - Detects violations of the defined coding standard
+ PHPUnit - run unit tests
+ DbUnit - PHPUnit extension for database tests
+ PHP_CodeCoverage - reports the test coverage of the code
+ phploc - measuring the size and analyzing the structure of a PHP project.
+ phpcpd - PHP CopyPaste Detector
+ PHP_CodeBrowser - generates reports on the results of the tools above

mod_rewrite and mod_ssl are enabled.

All of these installation instructions and a few more details can be found in the bootstrap.sh file in the /conf folder.
Additionally, use the /conf folder to store all the configuration files (for apache, php, mysql, etc.) that need to be changed and update the bootstrap.sh file to make sure that they get copied to the correct destination within the virtual machine.

This is a base installation. You can extend or alternate the  depending on the needs of your project, i.e. imagemagick or a different database. please do not commit changes like this to the base system.

##Kicking of a project
+ Install [Virtual Box](https://www.virtualbox.org/wiki/Downloads) and the extension package, if you have'nt allready.
+ create a fork of the skeleton in Bitbucket and clone in to Your local development machine.
+ Check Vagrantfile and conf/bootstrap.sh if the Machine fits Your needs.
  ++[Vagrant Doc](http://docs.vagrantup.com/v2/)
  ++[Commandline modifying of Virtual Box](http://www.virtualbox.org/manual/ch08.html#vboxmanage-modifyvm)
+ run the machine from the base directory of your project ```$ vagrant up```. This will download the Ubuntu image (if you haven't downloaded it before), boot, update and start your machine. If everything goes well you should be able to access your machine on the IP-address configured in Vagrantfile.
+ adjust build.xml, build/phpcs.xml, build/phpmd.xml, phpunit.xml, phpdox.html to your needs

##Projectstructure
The project directory is divided in the following directories.
+ build - contains output if the buildscipt
+ database - contains any database related files like SQLite database or SQLs for creating the database
+ htdocs - the folder mounted as webservers webroot with the files that habe to be accessable from the web
+ src - this is where the sourcecode of the project comes in. It should be devided in application code folders, which is the code delodi writes, and framework/libraries folders. the idea behind that, is to seperate our code, which which is inspected by our QA tools, from 3rd party code.
+ tests - this is where the test units are going to pe placed.

## Run the QA Build
login to your vagrant machine an run ```$ ant```from the projects rootfolder. See the results of the build in console and in build/code-browser

##Further information
For more details regarding this our development process visit the [page in Confluence](https://delodi.atlassian.net/wiki/display/DEL/Development+Process "Development Process").

Have a look at the example-project from [Sebastian Bergmann](https://github.com/thePHPcc/bankaccount), integrated in our sturcture. It's a nice Example of a fully testable Application, alltough it lacks documentation.

##Todo
+ PHPUnit_Selenium - for end to end tests
