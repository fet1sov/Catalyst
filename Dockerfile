FROM php:8.0-apache
EXPOSE 80
EXPOSE 3306

COPY ./www /var/www/site
RUN a2enmod rewrite

RUN docker-php-ext-install mysqli pdo pdo_mysql

CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]