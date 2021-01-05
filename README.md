# FileExplorer

A multiUser PHP/JS Tool to access a server's fileSystem originally finished on April 29, 2018 and updated in 2021

## Update

This software is being updated in 2021 with better technologies and security. changes includes:

1. replacing the ajax requests with fetch
2. Implementing access control as part of user management
3. Replacing password encryption with blowfish
4. Replacing JSON Generation with `json_encode` of an array

## Usage

Just upload it on the target Server and visit the URL. the index file will take care of everything

### Authentification

To manage credencials and users, Edit the `login.php` file.
Go to Line 27 and fill in the `$users` Array with the username and passord you want.
The password is encoded in MD5.

```php
$users = array(
    "DemoUser" => "86a8b9ded31796c99d3cd6336609bc88", // SuperSecurePassword
    "NewUser" => md5("Don't do it like that..."),
    "NewUser2" => "12bf6a7d14ac30c11ddcc00181488214" // do this instead
);
```

### Limitations

This system runs with the same permissions than the Web Server itself. I protected my personal docuemnts by refusing access to it at the FileSystem Permission Level.

```bash
chmod -Rv o-rwx ~/Documents
```
