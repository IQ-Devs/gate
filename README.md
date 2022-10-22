[comment]: <> (# gate <br />)

[comment]: <> (البوابة مال عراق<br /> )

[comment]: <> (2 do .<br />)

[comment]: <> (-android app for sending sms to the restful api <br />)

[comment]: <> (-Task Scheduling for check auth token from cells company / check daily limits of sim  <br />)

[comment]: <> (-add another  top up options <br />)

[comment]: <> (-add notifications sys for daily limit <br />)

[comment]: <> (- add bill type / charge/ transaction  etc. )

[comment]: <> (-next step edit profile controller - link bill table with transfer-charge)

# Installation

using ddev 

```shell
mkdir my-laravel-app
cd my-laravel-app
ddev config --project-type=laravel --docroot=public --create-docroot
ddev start
git clone https://github.com/IQ-Devs/gate.git
ddev composer install
ddev exec "cat .env.example | sed  -E 's/DB_(HOST|DATABASE|USERNAME|PASSWORD)=(.*)/DB_\1=db/g' > .env"
ddev exec 'sed -i "s#APP_URL=.*#APP_URL=${DDEV_PRIMARY_URL}#g" .env'
ddev exec "php artisan key:generate"
ddev launch
```





---

# To Do List

- [ ] add another  top up options

- [ ] add bill type / charge/ transaction  etc.

- [ ] next step edit profile controller - link bill table with transfer-charge

- [ ] Task Scheduling for check auth token from cells company / check daily limits of sim

- [ ] add notifications sys for daily limit

- [x] android app for sending sms to the restful api


