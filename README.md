# SPY

SPY is a school project. 

This is the website of a spy agency. It allows data management. 

The front office is accessible to any user. It contains the list of the missions in alphabetical order. A pagination offers an easy navigation without refresh the page. A search bar is useful to search a mission by its first letters inside the title or the description. When the user clicks on the title of a mission, he is redirected on the page which displays the details of the mission. 

The back office is accessible to the administrators of the website only. It allows to manage the database. The administrators have to log in via a secure form (front and back). They can log out. This back office allows to create, read, update and delete data using secure forms. The URLs are protected too because they are accessible to administrators only and the id of each data is encrypted. 



## How to use ? 

See the website : [Spy](https://spyagentssecrets.herokuapp.com/) 



## Table of contents 

1. [How to use ?](#How-to-use-?)
2. [Prerequisites](#Prerequisites)
3. [Installation](#Installation)
4. [Run](#Run)
5. [Log in as an administrator](#Log-in-as-an-administrator)
6. [Built with](#Built-with)
7. [Deploying](#Deploying)
8. [Author](#Author)
9. [License](#License)



## Prerequisites 

* MySQL version 5.7

* PHP version 7.4

* MAMP (Macintosh, Apache, MySQL et PHP) 



## Installation 

1. Create a folder cours in the htdocs of MAMP. 


2. Download the zip or clone the project in local :

`git clone https://github.com/Melissa-code/kgb.git`


3. Move into the directory :

`cd /path/to/the/file/kgb`


4. Open the project with a code editor, for instance Visual Studio Code.


5. Start MAMP, click on WebStart then Tools and go to phpMyAdmin.


6. Create the database project_kgb by a SQL query in the tab SQL :

`CREATE DATABASE project_kgb;`

`USE project_kgb;`


7. Add a new user for the database :

In phpMyAdmin, click on the tab User Account. Fill in the Username and the Password fields. Then, check the global privileges (here are all privileges) and link the user to the database. 


8. Connect the project to the database. Go to the file : models/Class/Model.php and change the values of the variables $username and $password. 


9. Create all the tables and insert data using the queries of the sql_queries file of the project. 


10. You can import the database project_kgb.sql in the tab Import of phpMyAdmin too. Upload the file. 



## Run 

1. Start MAMP if it's not already started.

2. Open your browser and navigate to `http://localhost:8888/cours/kgb/`



## Log in as an administrator

1. In the login function of the AdminController, write : 
`echo password_hash("passwordToHash", PASSWORD_DEFAULT);`

2. Copy (Ctrl + C) the encrypted password displayed on the login page and remove it.

3. Edit the password saved in the database for an Administrator (id_admin = 1) with a SQL query :
`UPDATE Admins SET password_admin = 'hashedPassword' WHERE id_admin = 1;`

It is possible to change the email too : 
`UPDATE Admins SET email_admin = 'example@gmail.com' WHERE id_admin = 1;`

4. Or create a new user : 
`INSERT INTO Admins (name_admin, firstname_admin, email_admin, password_admin, secret_admin) VALUES ('NameExample', 'FirstnameExample','email@example.com', hashedPassword, SHA1('password'));`



## Built with 

### Languages and Frameworks 

* PHP 7.4 (PHP Documentation [PHP Documentation](https://www.php.net/manual/fr/index.php "PHP Documentation")).

* SQL (SQL Documentation [SQL Documentation](https://sql.sh/ "SQL Documentation")).

* HTML 5 et CSS 3 (HTML CSS MDN Documentation [MDN Documentation](https://developer.mozilla.org/fr/docs/Web "HTML & CSS MDN Documentation")) & (W3School [W3School](https://www.w3schools.com/ "W3School")).

* Bootstrap 5.1 (Bootstrap Documentation [Bootstrap Documentation](https://getbootstrap.com/ "Bootstrap Documentation")).

* Bootswatch 5 Spacelab theme (Bootswatch Documentation [Bootswatch Documentation](https://bootswatch.com/spacelab/ "Bootswatch Documentation Spacelab theme")).

* JavaScript ES6 (JavaScript Documentation [MDN JavaScript Documentation](https://developer.mozilla.org/fr/docs/Web/JavaScript "MDN JavaScript Documentation")).

* Git (Git Documentation [Git Documentation](https://git-scm.com/doc "Git Documentation")).


### Tools 

* GitHub (GitHub [GitHub](https://github.com/ "GitHub")).

* DBeaver Community [DBeaver Community](https://dbeaver.io/download/)

* FontAwesome (Fontawesome [Fontawesome](https://fontawesome.com/icons "Fontawesome")) and 
CDN font-awesome (CDN font-awesome [CDN font-awesome](https://cdnjs.com/libraries/font-awesome "CDN font-awesome")).

* Noun Project (Noun Project [Noun Project](https://thenounproject.com/ "Noun Project")).

* Google Fonts (Google Fonts [Google Fonts](https://fonts.google.com/ "Google Fonts")).

* Unsplash (Unsplash [Unsplash](https://unsplash.com/fr "Unsplash")).

* Trello (Trello [Trello](https://trello.com/ "Trello")).


### IDE 

* Visual Studio Code (Visual Studio Code [Visual Studio Code](https://code.visualstudio.com/ "Visual Studio Code")).



## Deploying 

The production deployment of Spy is hosted on Heroku [Heroku](https://www.heroku.com/).


### Prerequisite 

1. Install Git and Initialize a Git repository

2. Create a Heroku account

3. Install the Heroku CLI, for instance for MacOS use : `$ brew tap heroku/brew && brew install heroku`

(cf. Heroku Documentation [Heroku Documentation](https://devcenter.heroku.com/articles/heroku-cli "Heroku Documentation")). 
   
Verify the installation using : `heroku --version`


### Get started 

1. Log in to Heroku with the command :

`heroku login`


2. Create a new app :

`heroku create spyagentssecrets`


3. Remote the local project to the Heroku app :

`git add .`

`git commit -m "Deploying the project."`

`git push heroku main`


(cf. Deploying a PHP App on Heroku [Heroku Documentation](https://devcenter.heroku.com/articles/deploying-php "Heroku Documentation")).


### Create a database 

1. Create a new MySQL database with the Addon JawsDb :

`heroku addons:create jawsdb:kitefin`

(cf. Install JawsDB MySql [JawsDB MySQL](https://devcenter.heroku.com/articles/jawsdb "JawsDB MySQL")).


2. Get the JAWSDB_URL :

`heroku config:get JAWSDB_URL`


3. On the dashboard of Heroku's app, click on the JawsDB link to get the credentials of the database. 


4. Import the local database to the new database. Enter the credentials of JawsDB's database (replace hostname, username and password) :

`mysql -h hostname -u username -ppassword database < quai_antique.sql`


If necessary, check the file models/Class/Model.php :

(cf. Using JawsDb with PHP [Using JawsDb with PHP](https://devcenter.heroku.com/articles/jawsdb#using-jawsdb-with-php "Using JawsDb with PHP")).


5. Deploy again :

`git add .`

`git commit -m "Create the database"`

`git push heroku main`


6. Use DBeaver Community to work with the database and enter SQL queries to change the emails and the passwords of the admins table [Log in as an Administrator](#login-as-an-administrator). 



## Author 

Melissa-code 



## License 

[MIT](https://choosealicense.com/licenses/mit/)



