# Website of Musikverein "Musikalische Löwen" Nentershausen

[![coverage report](https://gitlab.com/lukasmu/loewen/badges/master/coverage.svg?style=flat-square)](https://gitlab.com/lukasmu/loewen/-/commits/master)
[![pipeline status](https://gitlab.com/lukasmu/loewen/badges/master/pipeline.svg?style=flat-square)](https://gitlab.com/lukasmu/loewen/-/commits/master)

This repository contains the code for the website of the Musikverein "Musikalische Löwen" Nentershausen available at [musikalische-loewen.de](https://musikalische-loewen.de).
In the following this website is just referred to as the 🦁 website.
Happy coding!

## History

The first 🦁 website was created in the early years of the twenty-first century by André Metternich. A completely revised website was then launched in the year 2012 by Lukas Müller. Then in the year 2021 another revamp was performed by Anna-Maria Ortseifen, Pascal Zängerle and Lukas Müller.

The new 🦁 website is based on the Laravel framework and comes with complete CI/CD workflows.

## Installing

In the following some instructions for installing the 🦁 website in a local development environment are presented. The entire installation process should not take much longer than 15 minutes.

It is assumed that you are using Windows 10 as operating system. In case that you are using Linux or Mac you need to do things slightly different, but usually the process is even more straightforward.

1. Make sure to install a GIT client (e.g. [the native one](https://git-scm.com/downloads)) and an IDE of your choice (e.g. [PHPStorm](https://www.jetbrains.com/phpstorm/)).
2. Then install Visual C++ Redistributable for Visual Studio, PHP and Composer as explained on [https://devanswers.co/install-composer-php-windows-10/](https://devanswers.co/install-composer-php-windows-10/]). Please do not yet install PHP 8 but PHP 7 for the time being.
3. Go to the directory where you installed PHP, search for the php.ini file and enable the extensions pdo_sqlitee, sqlite3 and fileinfo by removing the semicolon before the lines extension=pdo_sqlite, extension=sqlite3 and extension=fileinfo. Save the php.ini file.
4. Then clone this repository to your computer. Simply run ```git clone https://gitlab.com/lukasmu/loewen.git``` in the directory of your choice. Afterwards switch to the cloned directory by typing ```cd loewen``.
5. Run  ```composer create-project``` to finalize the installation of the 🦁 website. This might take a minute or two.
6. Run ```php artisan serve``` to startup your local development server. Click on the link that appears on your console to setup WordPress. If you want to stop the server press CTRL and C.
7. Run ```php artisan migrate:refresh --seed``` to initialize a development database.

## Testing

You can run all tests by calling ```php artisan test```. Make sure that your local development server is running in the background for the browser tests!

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.
Hereafter some development tips & tricks can be shared.

- Just create a new branch for every contribution and do not forget to add tests. When your contribution is ready, please draft a new merge request. Once this request is approved it will be automatically deployed with almost zero-downtime to the [production environment](https://gitlab.com/lukasmu/loewen/-/environments).
- Very important tip: Add lots of easter eggs!
- If you are using [PHPStorm](https://www.jetbrains.com/phpstorm/) you can add the two SQLite databases in the database folder as data sources so that you can directly browse the database from within your IDE.
- To be continued...

## Help

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Security

If you discover a security vulnerability within the code of the 🦁 website, please send an e-mail to Lukas Müller via [hello@lukasmu.com](mailto:hello@lukasmu.com). All security vulnerabilities will be promptly addressed.

## License

The 🦁 website is open-sourced software licensed under the MIT license. Please see [LICENSE](LICENSE.md) for details.
