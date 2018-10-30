# Kiosk

Kiosk is a web application for summer camps were the kids deposit their kiosk money to a »bank« at the beginning and spend it cashless. To keep track of their payments I created this simple web application.

## Installation

Currently the web app is only for self-hosting, but I consider to build a platform for easier usage. Anyway, let's get started. First you have the [Laravel](https://laravel.com/docs/5.6/installation#installation) requirements. On top of that we need PHP 7.2, Node and Gulp for building the frontend assets, `mysqldump` for quickly creating backup database dumps. That's pretty much it.

⚠️ *Be sure to include a htaccess login if it is accessible via internet.* ⚠️

## Troubleshooting

- *My database export file is empty.* Be sure `mysqldump` is accessable for the webserver. Maybe the `$PATH` has to be set.
- *I'm missing a feature.* Create an [issue](https://github.com/runepiper/kiosk/issues/new) and we can discuss if the feature is useful for all people using Kiosk.
