FROM php:7.2-apache
MAINTAINER  A.Sauer

# insall global requirements
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev zip unzip && rm -rf /var/lib/apt/lists/* 

# Enable Apache Rewrite Module
RUN a2enmod rewrite

# Install PHP extensions
RUN docker-php-ext-configure gd --with-png-dir=/usr --with-jpeg-dir=/usr \
    && docker-php-ext-install gd \
    && docker-php-ext-install mysqli

VOLUME /var/www/html

EXPOSE 80
EXPOSE 443

# add code
#ADD index.html /var/www/html/index.php
#ADD info.php  /var/www/html/info.php
COPY index.php /var/www/html/index.php
# process code
RUN chmod 755 /var/www/html/index.php

# add documnetation
ADD Dockerfile        /Dockerfile

# application entrypoint
# ADD Dockerrun.sh     /run.sh
# RUN chmod +x /run.sh

# CMD ["/usr/local/bin/apache2-foreground"]
CMD ["apache2-foreground"]
