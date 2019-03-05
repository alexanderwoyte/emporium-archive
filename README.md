# emporium-archive
Share files with a close, regulated circle of buds. An invite only file sharing platform/cms.

Current Functions:
 - [x] Take input from users about requested uploads.
 - [x] Allow users to fulfill upload requests by uploading ".zip", ".tar" and ".rar" compressed archives.

This project is designed for use (and best hosted) on a "LAMP" (Linux installed with Apache, MySQL and PHP) server. You will find that some (non sensitive) information is stored in a plaintext csv (comma separated value, a spreadsheet format) file rather than in an encrypted database as is with the login information. This is for the sake of easy access, simplicity and general laziness. It may (should) be changed later at some point.

TODOs (in order of importance)
 - [ ] TODO: Create a record of successfully uploaded files.
 - [ ] TODO: Create a log in system and a special registration link generator.
 - [ ] TODO: Create a home page detailing all uploaded files.
 - [ ] TODO: Create a profile handler with user information/stats.
 - [ ] TODO: Create a sort/search function for files.
 - [ ] TODO: Finish existing, lower priority TODOs within files.
 - [ ] TODO: Convert the csv parsing system to MySQL for the sake of speed and regularity.

Here is what your directory structure should look like, if you use this project:

>x/www

This should be right behind your webroot.

>x/www/wad

This is Where All the Data is at. Regular file permissions are fine.

>x/www/wad/requests.csv

Here is a record of user requested uploads. Play around with the permissions, make sure it is writable.
  
>x/www/wad/uploads/

This is where uploads will be kept, they will be auto-renamed based on the "download-title". For more on this, read what happens when post submit is set in x/www/html/upload.php .
  
>x/www/html

This should be the webroot. Adjust accordingly if you must.
  
>x/www/html/requests.php

This allows users to request uploads and it displays requests, which give the user the option to fulfill them.
  
>x/www/html/upload.php

This is the page that users are brought to after they opt to fulfill an upload request (requests.php), it simply takes in an archive file (TODO: and album art, maybe description?) and does the rest of the work for the user.

