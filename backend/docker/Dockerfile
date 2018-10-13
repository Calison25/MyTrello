FROM ubuntu:16.04

ENV DEBIAN_FRONTEND noninteractive
ENV TZ=America/Brazil

RUN apt-get upgrade
RUN apt-get update
RUN apt-get install -y wkhtmltopdf xvfb libreoffice vim
RUN apt-get install -y software-properties-common
RUN LC_ALL=C.UTF-8 add-apt-repository -y -u ppa:ondrej/php
RUN apt-get update
RUN apt-get install -y apache2 acl
RUN apt-get install -y imagemagick graphicsmagick
RUN apt-get install -y libapache2-mod-php7.2 php7.2-bcmath php7.2-bz2 php7.2-cli php7.2-common
RUN apt-get install -y php7.2-curl php7.2-dba php7.2-gd php7.2-gmp php7.2-imap php7.2-intl
RUN apt-get install -y php7.2-ldap php7.2-mbstring php7.2-mysql php7.2-odbc
RUN apt-get install -y php7.2-pgsql php7.2-recode php7.2-snmp php7.2-soap php7.2-sqlite
RUN apt-get install -y php7.2-tidy php7.2-xml php7.2-xmlrpc php7.2-xsl php7.2-zip
RUN apt-get install -y php-gnupg php-imagick php-mongodb php-fxsl

COPY trello_api/apache2/sites-available/trello.conf /etc/apache2/sites-available/000-default.conf
COPY trello_api/root/.bashrc /root/.bashrc
COPY trello_api/init.sh /usr/local/bin/

RUN a2enmod rewrite

RUN sed -i -e 's/max_execution_time = 30/max_execution_time = 300/g' /etc/php/7.2/apache2/php.ini
RUN sed -i -e 's/upload_max_filesize = 2M/upload_max_filesize = 256M/g' /etc/php/7.2/apache2/php.ini
RUN sed -i -e 's/post_max_size = 8M/post_max_size = 512M/g' /etc/php/7.2/apache2/php.ini
RUN sed -i -e 's/memory_limit = 128M/memory_limit = 1024M/g' /etc/php/7.2/apache2/php.ini
RUN sed -i -e 's/;date.timezone =/date.timezone = "America\/Bahia"/g' /etc/php/7.2/apache2/php.ini

# Install Xdebug
RUN apt-get install -y php-xdebug

WORKDIR /var/www/trello/
ENTRYPOINT ["/bin/bash"]
CMD ["/usr/local/bin/init.sh"]
EXPOSE 80