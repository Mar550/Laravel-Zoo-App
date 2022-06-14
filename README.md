# ZOO SPACE

ZooSpace is an application to list the animals in a Zoo. This was my first full-stack application created using Laravel. The animals present in the zoo are listed, the user can create, edit or delete these animals. Each animal in the zoo should belong to one family, and to one or many continents.


## How to run the app

1. Download the application and open the folder
2. Install all dependencies using the ‘npm I’ command.
3. Start the web server using the ‘php artisan serve’. The app will be served at http://localhost:80000/.
4. Go to http://localhost:80000/ in your browser and access to the home page.


## User stories

- A user can see the list of the currently present animals
- A user can create a new animal
- A user can edit the informations of an existing animal
- A user can delete an existing animal
- A user can search for an animal among the existing ones
- A user can view a list of the continents from which the existing animals come from.
- A user can view a list of the families to which the existing animals belong.


## Features

- Creating an animal
	The animal created is displayed of the « Animals » page.
	The animal informations must be relevant and complete to be validated.

- Editing an animal
	The animal informations are displayed on an editable form.
	The animal new informations must be relevant and complete to be validated.

- Deleting an animal
	The animal deleted is removed from the database and doesn’t appear anymore.

- Searching an animal
	The keyword searched gets sent to backend and allows to get any corresponding animal among the existing ones. 


## Coming features

- Place the animals in a world map image following the continents they are present in.


## Technologies

- PHP
- Laravel
- JQuery
- JavaScript


## Dependencies

- Popperjs/core 2.20.2
- Axios 0.21
- Bootstrap 5.1.3
- Caravel-mix 6.0.6
- Lodash 4.17.19
- Postcss 8.1.14
- Sass 1.32.11
- Sass-loader 11.0.1


## What the app looks like
<img width="1438" alt="Capture d’écran 2022-06-14 à 16 45 36" src="https://user-images.githubusercontent.com/85247784/173633102-1a81fd76-b113-4663-8cf3-08a5b850bd1c.png">
<img width="1438" alt="screenshot-zoospace-2" src="https://user-images.githubusercontent.com/85247784/173633137-0f19f8a6-4346-4d08-b978-aa0981456741.png">
<img width="1438" alt="screenshot-zoospace-3" src="https://user-images.githubusercontent.com/85247784/173633159-698fadca-1e02-4670-b2a6-2017b44168e3.png">

