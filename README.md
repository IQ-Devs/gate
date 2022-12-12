t

# Installation
## Gitpod 

[![Open in Gitpod](https://gitpod.io/button/open-in-gitpod.svg)](https://gitpod.io/#https://github.com/IQ-Devs/gate)

## Using DDev 

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

### general

- [ ] add another  top up options

- [x] add bill type / charge/ transaction  etc. in bill migration file 

- [ ]  edit profile controller - link bill table with transfer-charge

- [ ] enums

- [x] android app for sending sms to the restful api

---

### core module

#### create table to handle phones

- [x] table authcore-phones
  
  | ID  | PHONE | PROVIDER | BALANCE | STATUS | DAYLI LIMIT | API TOKEN | CHARGE TYPE |
  | --- | ----- | -------- | ------- | ------ | ----------- | --------- | ----------- |
  |     |       |          |         |        |             |           |             |

#### create controller to handle multiple tasks

- [ ] verify the checkout transactions - card/transfer using the api (queue)

- [ ] phone limit notifications for admin (middleware ) 

- [ ] CRUD  for admins 
