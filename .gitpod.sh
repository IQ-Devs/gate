
#if before
if [ "$TASK" == "before" ]; then
if [ "$GITPOD_IDE_ALIAS" == "phpstorm" ]; then echo -e 'alias npm="ddev exec npm " \n alias php="ddev exec php"  ' >> ~/.bashrc  ;fi
sudo su
apt-get update
apt-get install -y ddev
exit
ddev start -y
export DDEV_NONINTERACTIVE=true
ddev exec "cat .env.example | sed  -E 's/DB_(HOST|DATABASE|USERNAME|PASSWORD)=(.*)/DB_\1=db/g' > .env"
ddev exec "sed -i "s#APP_URL=.*#APP_URL=${DDEV_PRIMARY_URL}#g" .env"
ddev exec "php artisan key:generate"
ddev exec "php artisan migrate"
ddev exec "php artisan db:seed"
ddev exec "php artisan storage:link"

    fi

#both
ddev exec "composer install"

# if init
if [ "$TASK" == "init" ]; then

ddev   exec "npm i -g npm@latest"
ddev   exec "npm install"
ddev   exec "npm audit fix --force"
ddev   exec "npm run dev"
    fi
