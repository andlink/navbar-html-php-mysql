## NAVBAR 

Easy PHP script for HTML login. The sessions are storen in a MySQL database

### HTML
Form for login:
```html
<form action="login.php" method="post">
	<label for="uname">Username</label>
	<input type="text" placeholder="Enter Username" name="uname" required>			
	<label for="passw">Password</label>
	<input type="password" placeholder="Enter Password" name="passw" required>

	<button type="submit">Login</button>
</form>
```

Form for logout:
```html
<form action="logout.php">			
	<button type="submit">Logout</button>
</form>
```


### PHP
Login function
```php
auth_login($_POST['uname'],$_POST['passw']);
```

Logout function
```php
auth_logout();
```


### MySQL database
#### TABLE session
| Column Name   | Type     |
| ------------- | -------- |
| uid           | char(32) |
| iduser        | int(11)  |
| creation_date | datetime |

#### TABLE user 
| Column Name   | Type        |
| ------------- | ----------- |
| iduser        | int(11)     |
| username      | varchar(45) |
| password      | varchar(32) |
