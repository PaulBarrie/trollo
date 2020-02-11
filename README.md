# Trollo
*Trollo* is a team project manager that allows you to manage your tasks, like Trello but en moins beau. 

>## Requirements

Before starting using *Trollo*, make sure you have all the required dependencies install on your machine, that is to say:

- MySQL Server
- Apache2
- Php (>7.0)
- Composer

>## Setting up *Trollo*

Once all these requirements are satisfied, you can start using *Trollo*. To do so, clone the git repository:

`git clone github.com/PaulBarrie/trollo`

>>### Setting up the database
Go to the app directory and change the `DATABASE_URL` value with your own configuration in the `.env` file. When this is done, you can create the database on your own MySQL server entering the following command line in the app directory:
`php bin/console doctrine:database:create`

Then you can prepare the migrations doing
`php bin/console make:migration`

And finally migrate and run
`php bin/console doctrine:migrations:migrate`

>>>### Populate the database
In order to populate the database and fully enjoy trello at start you should load fixtures. Fixtures are made using fakers. Hence before making fixture load faker library:
`composer require fzaninotto/faker`

And require from the ORM fixtures bundle:
`composer require orm-fixtures`

Now, you can make fixtures:
`php bin/console make:fixtures`

And load them:
`php bin/console make:fixtures`

>>## Start using *Trollo*
Require a server to test in local:
`composer require server --dev`

And then run the server:
`php bin/console server:run`

Finally connect yourself to the locally hosted webapp at 127.0.0.1:8000. 
Once arrived on the main page you can either create an account or directly connect yourself using the email `john@doe.fr` with the password `jesuisjohn`. Enjoy ! :)
