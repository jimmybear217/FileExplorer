# FileExplorer
A multiUser PHP/JS Tool to access a server's fileSystem Finished on April 29, 2018


## Usage
Just upload it on the target Server and visit the URL. the index file will take care of everything

### Authentification
To manage credencials and users, Edit the `login.php` file.
Go to Line 27 and fill in the `$users` Array with the username and passord you want.
The password is encoded in MD5.
```
$users = array(
	"DemoUser" => "86a8b9ded31796c99d3cd6336609bc88", // SuperSecurePassword
	"NewUser" => md5("Don't do it like that..."),
	"NewUser2" => "12bf6a7d14ac30c11ddcc00181488214" // do this instead
);
```

## Licence
Feel Free to improve this code, but keep it lightweight, please.
