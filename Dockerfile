# Utilise l'image officielle PHP avec Apache
FROM php:8.2-apache

# Active mod_rewrite (optionnel si tu veux plus tard du routing propre)
RUN a2enmod rewrite

# Copie les fichiers de ton app dans le dossier web
COPY . /var/www/html/

# Donne les bons droits
RUN chown -R www-data:www-data /var/www/html

# Expose le port 80 (standard HTTP)
EXPOSE 80
