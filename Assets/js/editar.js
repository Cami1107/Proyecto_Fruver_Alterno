let modalEditar = document.querySelector('#editarModal'); //
let modalDelete = document.querySelector('#deleteModal');
modalEditar.addEventListener('show.bs.modal', event => {
    let mode = event.explicitOriginalTarget.getAttribute('data-type');
    if(mode == 'create') {
        store.modalMode = "Crear Usuario";
        store.actualUser = {
            tipoDoc_usuario: "Cedula Ciudadania",
            identificacion_usuario: "",
            nombre_usuario: "",
            apellido_usuario: "",
            correo_usuario: "",
            telefono_usuario: "",
            direccion_usuario: "",
            estatus: 0,
            rol_id: 3,
            contraseña_usuario: "",
        }
    }else{
        let userId = event.explicitOriginalTarget.getAttribute('user-id');
        fetch(`http://localhost/archivos/Proyecto_Fruver_Alterno/api/api_Users/getUser.php?userId=${userId}`)
        .then(response => response.json())
        .then(data =>{
            store.actualUser = data;
            store.modalMode = "Actualizar Usuario";
        });
    }
}); 

modalDelete.addEventListener('show.bs.modal', event => {
    let userId = event.explicitOriginalTarget.getAttribute('user-id');
    document.getElementById('delete_user_id').value = userId
}); 
