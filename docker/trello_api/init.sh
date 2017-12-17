#!/bin/bash

set -e
rm -f /var/run/apache2/apache2.pid
source /etc/apache2/envvars
#cp /root/Settings.yaml /var/www/agilize/Configuration/Settings.yaml
touch /tmp/bac
chmod 777 /tmp/bac
echo "Init Flow..."
cd /var/www/agilize/ && rm -rf /var/www/agilize/Data/Temporary/ && ./flow core:setfilepermissions root www-data www-data
exec apache2 -DFOREGROUND
