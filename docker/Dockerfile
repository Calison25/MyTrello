FROM ubuntu:latest

ENV REFRESHED_AT 2017-12-16

RUN apt-get upgrade
RUN apt-get update
RUN apt-get install -y wkhtmltopdf xvfb libreoffice vim
RUN apt-get install -y software-properties-common python-software-properties
RUN LC_ALL=C.UTF-8 add-apt-repository -y -u ppa:ondrej/php
RUN apt-get update
RUN apt-get install -y apache2 acl
RUN apt-get install -y imagemagick graphicsmagick
RUN apt-get install -y libapache2-mod-php7.0 php7.0-bcmath php7.0-bz2 php7.0-cli php7.0-common php7.0-curl php7.0-dba php7.0-gd php7.0-gmp php7.0-imap php7.0-intl php7.0-ldap php7.0-mbstring php7.0-mcrypt php7.0-mysql php7.0-odbc php7.0-pgsql php7.0-recode php7.0-snmp php7.0-soap php7.0-sqlite php7.0-tidy php7.0-xml php7.0-xmlrpc php7.0-xsl php7.0-zip
RUN apt-get install -y php-gnupg php-imagick php-mongodb php-streams php-fxsl


RUN sed -i -e 's/max_execution_time = 30/max_execution_time = 300/g' /etc/php/7.0/apache2/php.ini
RUN sed -i -e 's/upload_max_filesize = 2M/upload_max_filesize = 256M/g' /etc/php/7.0/apache2/php.ini
RUN sed -i -e 's/post_max_size = 8M/post_max_size = 512M/g' /etc/php/7.0/apache2/php.ini
RUN sed -i -e 's/memory_limit = 128M/memory_limit = 1024]M/g' /etc/php/7.0/apache2/php.ini
RUN sed -i -e 's/;date.timezone =/date.timezone = "America\/Bahia"/g' /etc/php/7.0/apache2/php.ini

WORKDIR /var/www/trello
EXPOSE 80