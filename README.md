# TPEWeb2Api
#### Integrantes:
>* Mailen Martinez // Email: mailenmartinez199@gmail.com
## ENDPOINTS:
### Obtener Juegos (por defecto):
>* URL:/games/list
>* Verbo:  GET
>* Método: getGames
>* Descripción: Devuelve la lista de juegos. Si no se proporcionan parámetros de paginación y orden, se asume un conjunto predeterminado.

### Obtener Juegos con paginación y orden:

>* URL:/games/list/page/:PAGE/limit/:LIMIT/order/:ORDER
>* Verbo:GET 
>* Método: getGames
>* Descripción: Devuelve la lista de juegos con paginación y orden. Los parámetros :PAGE, :LIMIT, y :ORDER en la ruta permiten especificar la página, la cantidad de elementos por página y el campo de orden, respectivamente.

### Obtener 1 juego:

>* URL:/games/:ID
>* Verbo:GET
>* Método: getGame
>* Descripción: Devuelve la información de un juego específico identificado por su ID.

### Borrar Juego:

>* URL:/games/:ID
>* Verbo:DELETE
>* Método: deleteGame
>* Descripción: Borra un juego específico identificado por su ID.

### Agregar Juego:

>* URL:/games
>* Verbo:POST 
>* Método: addGame
>* Descripción: Agrega un nuevo juego utilizando los datos proporcionados en el cuerpo de la solicitud.

### Modificar un juego:

>* URL:/games/:ID
>* Verbo:PUT
>* Método: editGame
>* Descripción: Modifica un juego específico identificado por su ID utilizando los datos proporcionados en el cuerpo de la solicitud.
