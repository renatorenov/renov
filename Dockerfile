FROM php:8.3-apache

# Habilitar mod_rewrite do Apache
RUN a2enmod rewrite

# Configurar o DocumentRoot
ENV APACHE_DOCUMENT_ROOT=/var/www/html

# Copiar todos os arquivos do projeto para o container
COPY . /var/www/html/

# Ajustar permissões
RUN chown -R www-data:www-data /var/www/html \
    && chmod 755 /var/www/html/data

# Expor porta 80
EXPOSE 80
