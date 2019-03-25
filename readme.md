
## Laravel Test

Instruction

    $ git clone git@github.com:Piusha/laravel_vagrant.git
    $ cd laravel_vagrant
    $ vagrant up && vagrant ssh

Change the host file on your local 

Find IP address from `Vagrantfile` and update `host` file with ip address with name `temper.test`
    
    192.168.20.153 temper.test


Change .env file as follows

    DB_CONNECTION=mysql
    DB_HOST=sql12.freesqldatabase.com
    DB_PORT=3306
    DB_DATABASE=sql12284829
    DB_USERNAME=sql12284829
    DB_PASSWORD=a5YK4xTCIh
    

Run the application

    $ npm run app
  
If anything goes wrong login to the vagrant box and do the composer install manually
