<h1 align="center">VADMIN</h1>

# DOCUMENTACIÓN | Vadmin

Vadmin es un gestor de contenido. Permite el manejo de distintas secciones de una web como ser un blog, un catálogo, un portfolio, etc. Dispone de un módulo de gestión de usuarios, donde los mismo pueden tener distintos tipos de permisos y pertenecer a grupos. Por ejemplo: Clientes, Usuarios, Administradores.
- 
## FUNCIONALIDADES

### Actualizar estados con strings:
Con esta función se pueden actualizar estados basados en strings<br>
<b>Función (js):</b> updateStatusMultiple(id, route, status, username, action);

Parámetros <br>
- id: Id primario del item. <br>
- route: Ruta (Ej. var route  = "{{ url('/vadmin/message_status') }}/"+id+""; ); <br>
- status: Status según base de datos <br>
- username: Nombre de algún usuario <br>
- action: 'reload' => Para recargar página, 'show' => Para mostrar algo sin recargar, 'none' => Sin acción. <br>

Mediante JSON devuelve: <br>
- response: TRUE o FALSE <br>
- message: En caso de error devuelve info (/Exception $e)

### Actualizar estados de 1 o 0
Cambia el estado automáticamente.
Ej: Si está en 0 lo pasa a 1 y viceversa.

En data-model incluír el nombre del modelo
En data-id pasar el ID del item al que se le quiere cambiar el estado
Html:
Incluír la clase .UpdateStatus
> <input class="UpdateStatus switch-checkbox" type="checkbox" data-model="NOMBRE-DEL-MODELO" data-id="{{ $item->id }}" @if($item->status == '1') checked @endif>      <span class="slider round"></span>

# Variables Globales
en AppServiceProviders están las variables globales

# USUARIOS Y CLIENTES
## Tipos de Usuario (role)
- 1 Superadmin 
- 2 Admin 
- 3 User 
- 4 Guest

## Grupos (group)
- 1 Member
- 2 Employee

# Usuarios / Tienda
## Grupos (group)
- 1 New Client
- 2 Client Small
- 3 Client Big

# Carro de compras
## Estado de las órdenes
- 'Active' => Iniciado
- 'Process' => Pendiente
- 'Approved' => Aprobada
- 'Canceled' => Cancelada
- 'Finished' => Finalizada

# CARRO DE COMPRAS

- Mediante un ServiceProvider se envia a todas las vista de la Store los datos del carro activo ($activeCart)
> StoreServiceProvider.php

## Calcular precios del carro de compras

<blockquote>Método: calcCartTotalPrice($cart);</blockquote>

Devuelve un array con dos valores 
$data['subtotal']
$data['total']

## Compra mínima.
Se puede setear para que la compra mínima sea por prendas o por valor.

En StoreController@checkoutSetItems se maneja esto
y en CartTrait@activeCart() está la validación

## Metodos


updatePaymentAndShipping()
Pasar:
id // Id del carro de comprar
payment_method_id // Id del método de pago elegido
shipping_id // Id del método de envío elegido



# Helpers

roleTrd($role)
groupTrd($group)
clientGroupTrd($group)
orderStatusTrd($status)
messageStatusTrd($status)
transDateT($data)
getMonthName($month)
getUrl()

### Carbon - Date
eq() equals
ne() not equals
gt() greater than
gte() greater than or equals
lt() less than
lte() less than or equals



Más helpers en /app/Http/Helpers.php

# Variables Globales 
{{ APP_BUSSINESS_NAME }}

### Funcionalidades genéricas
Para llamar modelo dinámicamente usar:

> public function dynamicModel($model, $id)
  {
    $model_name = '\\App\\'.$model;
    $model = new $model_name;
    // Query
    $item = $model->findOrFail($id);
  }

> updateCartItemStock(CART ID, REQUESTED QUANTITY)
If is stock discount must be negative value



# PACKAGES UTILIZADOS

## Generar CRUDS automáticamente (Package: appzcoder)
Comando para generar CRUDS desde consola

<blockquote>php artisan crud:generate Posts --fields='title#string; content#text; category#select#options={"technology": "Technology", "tips": "Tips", "health": "Health"}' --view-path=admin --controller-namespace=Admin --route-group=admin --form-helper=html</blockquote>

<blockquote>php artisan crud:generate Catalog1 --fields='name#string' --view-path=vadmin/catalog1 --controller-namespace=Catalog --route-group=vadmin</blockquote>


# Laravel comandos y soluciones
Borrar log
sudo truncate -s 0 /storage/logs/laravel.log
sudo truncate -s 0 laravel.log

### Crear schedules
Crear comando en laravel
> php artisand command:create NombreDeComando
Este archivo se va a crear en app/Console/Commands
- En el método handle() ingresar lo que necesitemos hacer

En app/Console/Kernel.php
se activa la tarea y se le da un tiempo




Crear tarea en servidor

Primero testear con
------------
$ sudo crontab -u www-data -e
Add this entry:
* * * * * date >> /tmp/date.out
Now examine the output with:
$ tail -f /tmp/date.out
----------------

Luego comenzar con
sudo crontab -u www-data -e
* * * * * /Documentos/WebDev/Incubator/augustamoi/artisan schedule:run >> /dev/null 2>&1

Ver la tarea
crontab -l

Restartear cron
sudo service cron reload

Para empezar a correr la tarea
> php artisan schedule:run

----
Cron log
grep cron /var/log/syslog
Cron restart
service cron restart