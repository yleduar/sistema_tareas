# sistema_tareas

## Instalación

- Clonar el repositorio ``git clone https://github.com/yleduar/prueba-tecnica-php-raudely-pimentel.git](https://github.com/yleduar/sistema_tareas.git``
- Navegar hasta el directorio donde se encuentra clonado el proyecto
- Ejecutar el comando
  ``composer install``
  ``npm install``
  ``npm run dev``

- El siguiente paso configurar el .env, para este paso adjunto el archivo ya que este se encuentra ignorado por seguridad

- Se debe crear una base de datos vacía, preferiblemente con el nombre sistema_tareas, en caso de usar otro nombre, configurarlo en el .env

- Por último se debe aplicar el comando ``php artisan migrate --seed`` para que se ejecuten las migraciones y seeders
  
