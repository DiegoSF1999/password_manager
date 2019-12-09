Registro de usuarios

	POST: name, email, password
	http://localhost/password_manager/public/index.php/api/users

Login de usuarios
	
	POST: email, password
	http://localhost/password_manager/public/index.php/api/login
	
Crear categorías para usuario logeado

	HEADER: token
	POST: name
	http://localhost/password_manager/public/index.php/api/categories

Modificar categorias para usuario logeado

	HEADER: token
	POST: name, category_id
	http://localhost/password_manager/public/index.php/api/categories/change

	HEADER: token
	PATCH: name
	http://localhost/password_manager/public/index.php/api/categories/1

Borrar categorias para usuario logeado

	HEADER: token
	POST: category_id
	http://localhost/password_manager/public/index.php/api/categories/remove

	HEADER: token
	DELETE: 
	http://localhost/password_manager/public/index.php/api/categories/1

Crear contraseñas para usuario logeado

	HEADER: token
	POST: title, description, category_id
	http://localhost/password_manager/public/index.php/api/passwords

Modificar contraseñas para usuario logeado

	HEADER: token
	POST: title, description, category_id, password_id
	http://localhost/password_manager/public/index.php/api/passwords/change

	HEADER: token
	PATCH: title, description, category_id
	http://localhost/password_manager/public/index.php/api/passwords/change

Borrar contraseña para usuario logeado

	HEADER: token
	POST: category_id, password_id
	http://localhost/password_manager/public/index.php/api/passwords/remove

	HEADER: token
	DELETE: category_id, password_id
	http://localhost/password_manager/public/index.php/api/passwords/remove

Mostrar categorias para usuario logeado

	HEADER: token
	GET: 
	http://localhost/password_manager/public/index.php/api/categories

Mostrar contraseñas para usuario logeado

	HEADER: token
	GET: 
	http://localhost/password_manager/public/index.php/api/passwords

Mostrar las categorias del usuario logeado con sus contraseñas

	HEADER: token
	GET: 
	http://localhost/password_manager/public/index.php/api/ordered