#!/usr/bin/env bash

apt-get update

# some sysutils
apt-get install debconf-utils mailutils

# if apache2 does no exist
if [ ! -f /etc/apache2/apache2.conf ];
then

        # Install MySQL
        echo 'mysql-server-5.5 mysql-server/root_password password toor' | debconf-set-selections
        echo 'mysql-server-5.5 mysql-server/root_password_again password toor' | debconf-set-selections
        apt-get -y install mysql-client mysql-server-5.5

        # Install Apache
        apt-get -y install apache2

        # Install PHP 
        apt-get -y install php5 libapache2-mod-php5 php-apc php5-mysql php5-dev

        # Install OpenSSL
        apt-get -y install openssl

        # Install PHP pear
        apt-get -y install php-pear

        # Install sendmail
        cat /vagrant/conf/postfix.preseed | debconf-set-selections
        apt-get -y install postfix

        # Install CURL dev package
        apt-get -y install libcurl4-openssl-dev

        # Install libssl, needed for zendbugger
        apt-get install libssl0.9.8

        # Install PECL HTTP (depends on php-pear, php5-dev, libcurl4-openssl-dev)
        apt-get -y install make
        printf "\n" | pecl install pecl_http

        # Enable PECL HTTP
        echo "extension=http.so" > /etc/php5/conf.d/http.ini

        # Enable mod_rewrite    
        a2enmod rewrite

        # Enable SSL
        a2enmod ssl

        # Add www-data to vagrant group
        usermod -a -G vagrant www-data

        apt-get -y install ant
        apt-get -y install php5-xsl
        apt-get -y install php5-curl
        apt-get -y install php5-xdebug

        pear config-set auto_discover 1
        pear install --alldeps  pear.netpirates.net/Autoload
        pear install --alldeps  pear.pdepend.org/PHP_Depend
        pear install --alldeps  pear.phpmd.org/PHP_PMD
        pear install --alldeps  PHP_CodeSniffer
        pear install -f --alldeps  pear.netpirates.net/phpDox
        pear install --alldeps  pear.phpunit.de/PHPUnit
        pear install --alldeps  pear.phpunit.de/DbUnit
        pear install --alldeps  pear.phpunit.de/PHP_CodeCoverage
        pear install --alldeps  pear.phpunit.de/PHP_CodeBrowser
        pear install --alldeps  pear.phpunit.de/phploc
        pear install --alldeps  pear.phpunit.de/phpcpd

        # Set up the public folder by removing the existing one and replacing it by a Sym. pointing to Vagrant's public folder
	    rm -rf /var/www
	    ln -fs /vagrant/public /var/www
fi

 # Copy all the conf files present in the conf/apache2 folder to the host's etc/apache2 folder
cp -Rf /vagrant/conf/apache2/ /etc/apache2
 # Do the same for the PHP ini files as well
cp -Rf /vagrant/conf/php5/ /etc/php5/apache2
 # And then we copy our version of my.cnf to make sure we can ssh into the mysql instance in the VM
cp -Rf /vagrant/conf/mysql/my.cnf /etc/mysql/


 # Finally restart apache to apply our changes
/etc/init.d/apache2 restart
 # And mysql as well
service mysql restart

 # And clean up apt-get packages
apt-get -y clean
