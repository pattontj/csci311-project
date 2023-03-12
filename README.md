# csci311-project

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
