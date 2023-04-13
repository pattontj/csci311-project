# csci311-project

For creators:

In order to run the project, please create a file named `database.php` and replace the sections below with the correct information:
```php
<?php
$servername = "location_of_the_server";
$dbname = "name_of_the_target_database";
$username = "team_name";
$password = "database_password";
?>
```
Verify that the file name is correct by running `git status`; If done correctly, git should say the your local is up to date.

Please note that this file as been added to our .gitignore file. This is so that we avoid pushing our database password directly to the repository.
NEVER push this file, or for that matter, ANY FILE with sensitive information in it. This includes:
 - The hostname of the database
 - ssh keys
 - local system usernames
 - passwords
 - absoloute paths to files on the school server (I.E: https://realdomain.com/real/path/to/files.[php/png/svg/etc.] )

For reviewer:

Using this application: Hopefully the majority of this system is pretty straight forward and you should be a ble to use it without issue.
A couple of notes, first when you create an account there might be a message that appears that is mainly debug info. Just select the "return to login"
option and login in with the credentails that you just created.   

The site will not let you view any other page other than login or create account if you aren't logged in.

From what we've made there isn't any known features that aren't currently working so as long as you follow normal website procedures you shouldn't 
encounter any issues.

The search bar searches for posts that contain what you enter. It doesn't search usernames.

Hopefully you should be able to do everything that the application appears to let you do if you find any bugs please let us know.

Enjoy,

-The Dev team.