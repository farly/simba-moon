# Prerequisite

## PHP 7.4
## Symfony [https://symfony.com/](https://symfony.com/)

# Setup
- run  `composer install` 


# Limitations

- Unfortunately app only works when run with "phpunit". Since data are not persisted, and every request reinstantiate classes, all class variables are "cleared"

# Tests

## Running Tests
execute command a project root
`php ./bin/console tests`

