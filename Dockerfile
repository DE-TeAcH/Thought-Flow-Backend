FROM php:8.2-cli

# Install mysqli extension
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

WORKDIR /app

# Copy all PHP files
COPY . .

# Expose port
EXPOSE 10000

# Start PHP built-in server
CMD ["sh", "-c", "php -S 0.0.0.0:${PORT:-10000}"]
