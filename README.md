# JobsAustralia.tech Employers

Job matchmaking for employers in the Australian IT sector - written in Laravel 5.5.

## Contributors

* Aaron Horler
* Ozlem Kirmizi
* Dennis Mihalache
* Melissa Nguyen
* Kim Luu

## Setup instructions

Setup your development environment following [the official requirements](https://laravel.com/docs/5.5/installation).

Our Linux deployment script is [here](https://github.com/jobsaustralia/scripts-conf-and-docs/blob/master/scripts/deploy.sh#L1).

**Clone the repository**

`git clone https://github.com/jobsaustralia/employ.jobsaustralia.tech.git`

`cd employ.jobsaustralia.tech`

**[Configure](https://laravel.com/docs/5.5/configuration#environment-configuration) your environment**

`mv env.example .env`

**Install**

`composer install`

**Migrate, and (optionally) seed.**

`php artisan migrate --seed`
