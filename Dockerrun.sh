#!/bin/bash

echo "---> checking configuration"
/usr/local/bin/apache2-foreground -S

echo "---> checking application"
ls -lah /var/www/html
md5sum /var/www/html

echo "---> starting apache forgrounded"
/usr/local/bin/apache2-foreground
