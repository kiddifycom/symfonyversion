#!/usr/bin/env bash

apt-get update

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
        apt-get -y install sendmail

        # Install CURL dev package
        apt-get -y install libcurl4-openssl-dev

        # Install PECL HTTP (depends on php-pear, php5-dev, libcurl4-openssl-dev)
        printf "\n" | pecl install pecl_http

        # Enable PECL HTTP
        echo "extension=http.so" > /etc/php5/conf.d/http.ini

        # Enable mod_rewrite    
        a2enmod rewrite

        # Enable SSL
        a2enmod ssl

        # Add www-data to vagrant group
        usermod -a -G vagrant www-data

	 # Set up the public folder by removing the existing one and replacing it by a Sym. pointing to Vagrant's public folder
	rm -rf /var/www
	ln -fs /vagrant/public /var/www
fi

 # Copy all the conf files present in the conf/apache2 folder to the host's etc/apache2 folder
cp -Rf /vagrant/conf/apache2/ /etc/apache2
 # And do the same for the PHP ini files as well
cp -Rf /vagrant/conf/php5/ /etc/php5/apache2

 # Finally restart apache to apply our changes
/etc/init.d/apache2 restart

 # And clean up apt-get packages
apt-get -y clean
