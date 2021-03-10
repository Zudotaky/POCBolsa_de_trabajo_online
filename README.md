# POCBolsa_de_trabajo_online

### Pre-requisitos 📋

Se necesita la intalacion de [composer](https://getcomposer.org/) y [npm](https://www.npmjs.com/) o [yarn](https://yarnpkg.com/)
y instalar las de pendencias :
  php composer.phar install
  yarn install
  npm install
  
### Instalación 🔧

se necesita agregar en el .env una APP_SECRET escribiendo php bin/console secrets:generate-keys y DATABASE_URL creando una url [ejemplo](https://www.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/configuration.html#connecting-using-a-url)

## Despliegue 📦

primero levantar la base de datos. se puede crear con el comando php bin/console doctrine:database:create y php bin/console doctrine:schema:update --forse.
Y con esto ya se puede levantar el programa con "symfony serve".
