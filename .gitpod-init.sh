mysql -u root -e "create database test" &&
cp .env.example .env &&
sed -i "s|APP_URL=|APP_URL=${GITPOD_WORKSPACE_URL}|g" .env &&
sed -i "s|APP_URL=https://|APP_URL=https://8000-|g" .env &&
sudo apt install php-gmp -y &&
composer install &&
npm i && npm run dev &&
php artisan migrate &&
php artisan key:generate 

