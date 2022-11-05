<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruver Xpress</title>

    <!-- Conexión con boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- Conexión con CSS -->
    <link rel="stylesheet" href="CSS/Estilo.css">

    <!-- Fuentes de Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dongle:wght@300&family=Open+Sans&family=Oswald:wght@200;300;400;500;600;700&family=Roboto:ital,wght@0,100;1,100&display=swap" rel="stylesheet">
    
    <!-- cdn icons bootstrap v1.3 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>
<body>
    <div>
        <!-- Codigo para el header -->
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-fruver">
                <div class="container">
                    <a href="index.html"><img src="Multimedia/logo-carrito.png" alt="logo carrito"></a>
                    <a href="index.html">
                        <h2>Fruver Xpress</h2>
                    </a>
                    <!-- Solo se muestra cuando es diseño Responsive -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a href="logOut.php">Cerrar Sesion</a>
                </div>
            </nav>


        </header>
        <!-- Codigo para el main -->
        <main>
            <div class="container">
                <!-- boton que llama crear nuevo usuario -->
                <button 
                    type="button" 
                    class="btn btn-success mb-3" 
                    data-bs-toggle="modal" 
                    data-bs-target="#editarModal"
                    data-type="create"
                >
                    <i class="bi bi-plus-lg"></i> Crear Nuevo Usuario
                </button>
                <!-- Tabla de mostrar todo -->
                <table id="usersTable" class="table table-hover">
                    <tr class="table-success">
                        <th>id</th>
                        <th>Nombre</th>
                        <th>Fecha Vencimiento</th>
                        <th>Referencia</th>
                        <th>Ubicacion</th>
                        <th>Marca</th>
                        <th>Valor Compra</th>
                        <th>Valor Venta</th>
                        <th>Medida</th>
                        <th>Categoria</th>
                        <th>Categoria</th>
                        <th colspan="2"></th>
                    </tr>
                    <!-- template es una etiqueta de vue, que es parecido al foreach -->
                    <template v-for="user in store.allUsers">
                    <!-- user es la variable que almacena los datos -->
                        <tr>
                            <!-- llamar informacion usando vue -->
                            <td>{{ user.id_Prod }}</td>
                            <td>{{ user.producto_Nombre }}</td>
                            <td>{{ user.producto_FechaVencimiento }}</td>
                            <td>{{ user.producto_Referencia }}</td>
                            <td>{{ user.producto_Ubicacion }}</td>
                            <td>{{ user.producto_Marca }}</td>
                            <td>{{ user.producto_ValorCompra }}</td>
                            <td>{{ user.producto_ValorVenta }}</td>
                            <td>{{ user.id_Medida2 }}</td>
                            <td>{{ user.id_Cate2 }}</td>
                            <td colspan="2">
                                <div class="d-flex">
                                    <!-- boton modal de editar -->
                                    <button 
                                        :user-id="user.id_usuario" 
                                        type="button" 
                                        class="btn btn-success" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#editarModal"
                                        data-type="update"
                                    >
                                        <i :user-id="user.id_usuario" class="bi bi-pencil-square"></i>
                                    </button>
                                    <!-- boton modal de eliminar -->
                                    <button 
                                        :user-id="user.id_usuario" 
                                        type="button" 
                                        class="btn btn-danger ms-1" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#deleteModal"
                                    >
                                        <i :user-id="user.id_usuario" class="bi bi-trash-fill"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </template>
                </table>
            </div>
        </main>

        <!-- Codigo para el Footer -->
        <footer>
            <div class="container">
                <div id="contacts">
                    <ul>
                        <h2>Categorias</h2>
                        <li><a href="#">
                                <p>Aseo</p>
                            </a></li>
                        <li><a href="frutas.html">
                                <p>Frutas y verduras</p>
                            </a></li>
                        <li><a href="#">
                                <p>Granos</p>
                            </a></li>
                        <li><a href="#">
                                <p>Huevos y lacteos</p>
                            </a></li>
                        <li><a href="#">
                                <p>Licores</p>
                            </a></li>
                        <li><a href="#">
                                <p>Mecato</p>
                            </a></li>
                    </ul>
                    <ul>
                        <li>
                            <h2>Contacto</h2>
                            <a href="#">
                                <p>darizaduarte@gmail.com</p>
                            </a>
                            <a href="#">
                                <p>calle 188 15a 47</p>
                            </a>
                            <a href="#">
                                <p> 2022 Derechos reservados</p>
                            </a>
                        <li>

                        </li>
                    </ul>

                    <ul>
                        <li>
                            <h2>Redes sociales</h2>
                            <div class="iconosimg">
                                <a href="https://www.whatsapp.com/?lang=es"><img src="Multimedia/whatsapp.png" alt=""></a>
                                <a href="https://www.instagram.com/"><img src="Multimedia/Instagram.png" alt=""></a>
                                <a href="https://es-la.facebook.com
                                    "><img src="Multimedia/facebook.png" alt=""></a>
                            </div>
                        </li>
                        <li>

                        </li>
                    </ul>
                </div>
        </footer>
    </div>
    <!-- Codigo para el modal editar y crear -->
    <div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="userApp">
                <div class="modal-header">
                    <h5 class="modal-title" >{{store.modalMode}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <!-- <input type="hidden" value=""> -->
                        <!-- ver para que es -->
                        <div class="row">
                            <div class="col-md-6 mb-6">
                                <label for="tipoDoc_usuario" class="form-label">Número de Documento</label>
                                <input type="text" class="form-control" id="numDoc" aria-describedby="emailHelp" name="numDoc" v-model="store.actualUser.identificacion_usuario">
                            </div>
                            <div class="col-md-6 mb-6">
                                <label for="tipoDoc_usuario" class="form-label">Tipo de Documento</label>
                                <select class="form-control" id="tipoDoc_usuario" aria-describedby="emailHelp" name="tipoDoc_usuario" v-model="store.actualUser.tipoDoc_usuario">
                                    <option value="Cedula Ciudadania">Cedula Ciudadania</option>
                                    <option value="Tarjeta Identidad">Tarjeta Identidad</option>
                                    <option value="Cedula Extranjeria">Cedula Extranjeria</option>
                                </select>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-6">
                                <label for="nombre_usuario" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre_usuario" aria-describedby="emailHelp" name="nombre_usuario" v-model="store.actualUser.nombre_usuario"> <!-- v-model es sintaxis de vue para conectar datos de forma dinamica -->
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="apellido_usuario" class="form-label">Apellido</label>
                                <input type="text" class="form-control" id="apellido_usuario" aria-describedby="emailHelp" name="apellido_usuario" v-model="store.actualUser.apellido_usuario">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-6">
                                <label for="telefono_usuario" class="form-label">Telefono</label>
                                <input type="text" class="form-control" id="telefono_usuario" aria-describedby="emailHelp" name="telefono_usuario" v-model="store.actualUser.telefono_usuario">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="direccion_usuario" class="form-label">Direccion</label>
                                <input type="text" class="form-control" id="direccion_usuario" aria-describedby="emailHelp" name="direccion_usuario" v-model="store.actualUser.direccion_usuario">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-6">
                                <label for="correo_usuario" class="form-label">correo</label>
                                <input type="email" class="form-control" id="correo_usuario" aria-describedby="emailHelp" name="correo_usuario" v-model="store.actualUser.correo_usuario">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="direccion_usuario" class="form-label">estado</label>
                                <select class="form-control" id="estado_usuario" aria-describedby="emailHelp" name="estado_usuario" v-model="store.actualUser.estatus">
                                    <option value="1">activo</option>
                                    <option value="0">inactivo</option>                                    
                                </select>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <label for="doc_usuario" class="form-label">Rol</label>
                                <select name="rolUsuario" id="rolUsuario" class="form-select form-select-md mb-3" aria-label=".form-select-lg example" v-model="store.actualUser.rol_id ">
                                    <?php
                                    require_once('conexion.php');
                                    $sql = "SELECT * from rol;";
                                    $traerRol = $conexion->prepare($sql);
                                    $traerRol->execute();
                                    $leerRol = $traerRol->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($leerRol as $key => $datos) {
                                        echo "<option value='{$datos['id_rol']}'>{$datos['rol_Nombre']}</option>";
                                    }
                                    ?>
                                </select>   
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-6">
                                <label class="form-label">Contraseña:</label>     
                                <input  class="form-control" type="password" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Confirmar contraseña:</label> 
                                <input class="form-control" type="password" v-model="store.actualUser.contraseña_usuario">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-success" data-bs-dismiss="modal" v-on:click="store.updateUser()">Aceptar</button>
                            <input type="submit" value="Aceptar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- fin codigo ventana emergente modal -->
    <!-- Modal ELIMINAR-->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Eliminar Usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Esta acción irerversible, ¿Seguro qué quieres continuar?</p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="delete_user_id" id="delete_user_id" value="">
                        <button type="button" class="btn btn-info" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="store.deleteUser()">Eliminar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Javascript Antes de cerrar el body-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="Assets/js/vue/vue.js" type="text/javascript"></script>
    <script src="Assets/js/store.js" type="text/javascript"></script>
    <script src="Assets/js/editar.js" type="text/javascript"></script>
    <script src="Assets/js/components/allUsers_component.js" type="text/javascript"></script>
    <script src="Assets/js/components/user_component.js" type="text/javascript"></script>
</body>
</html>