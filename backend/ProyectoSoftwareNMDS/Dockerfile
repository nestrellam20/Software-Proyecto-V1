FROM php:5.6-apache

# Copiar archivos de configuración de Apache
COPY ./config/000-default.conf /etc/apache2/sites-available/000-default.conf

# Copiar el contenido de la aplicación
COPY ./html/ /var/www/html/

# Establecer permisos
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html

# Habilitar el módulo de reescritura de Apache
RUN a2enmod rewrite

# Exponer el puerto
EXPOSE 80

# Comando para ejecutar Apache en primer plano
CMD ["apache2-foreground"]
