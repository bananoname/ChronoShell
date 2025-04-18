FROM php:8.2-apache

# Copy source code vào container
COPY index.php /var/www/html/index.php
COPY style.css /var/www/html/style.css
COPY flag.txt /var/www/html/flag.txt

# Bật mod_rewrite (nếu cần routing)
RUN a2enmod rewrite

# Sửa quyền nếu cần
RUN chmod 755 /var/www/html/flag.txt

EXPOSE 80

