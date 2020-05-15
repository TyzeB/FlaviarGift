# Flaviar Gift

#### A simple gift order app using Vue.js and Symfony
Check it out here: https://flaviar.herokuapp.com/

### How to run

```
cd FlaviarGift
php composer install
php bin/console doctrine:schema:update --force
php bin/console make:migration
symfony server:start
yarn
```

### Don't forget to add this to .env file
```
DATABASE_URL=sqlite:///%kernel.project_dir%/var/data.db
```