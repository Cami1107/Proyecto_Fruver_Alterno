// Proxy que se conecta un componente del front
// Sirve para tener datos reactivos
// reactivos = interactivos
const  { reactive } = Vue
const { createApp } = Vue;
const store = reactive({
  actualUser: {},
  modalMode: '',
  allUsers: [],
  createUser(){
    //Funcion para crear datos
    // dataform es una función de js 
    // recibe la informacion desde un json, lo formatea como tabla a la db
    let dataForm = new FormData()
    dataForm.append("create","yes")
    dataForm.append("data", JSON.stringify(this.actualUser))
    fetch(
        `http://localhost/archivos/Proyecto_Fruver_Alterno/api/createDataUser.php`,{
            method: 'POST',
            body: dataForm
        }
    )
    .then(response => {
        this.getAllUsers()
        console.log(response)
        response.json()
    })
    .then(data =>{
      console.log(data)       
    });
  },
  getAllUsers(){
    fetch(`http://localhost/archivos/Proyecto_Fruver_Alterno/api/getAllUsers.php`)
    .then(response => response.json())
    .then(data =>{
        store.allUsers = data     
    });
  },
  updateUser(){
    if(this.modalMode == "Crear Usuario"){
      return this.createUser()
    }
    //funcion para actualizar datos
    let userId = this.actualUser.id_usuario
    let dataForm = new FormData()
    dataForm.append("userId",userId)
    dataForm.append("data", JSON.stringify(this.actualUser))
    fetch(
        `http://localhost/archivos/Proyecto_Fruver_Alterno/api/updateDataUser.php`,{
            method: 'POST',
            body: dataForm
        }
    )
    .then(response => {
        this.getAllUsers()
        console.log(response)
        response.json()
    })
    .then(data =>{
      console.log(data)       
    });
      
  },
  deleteUser(){
    //funcion para actualizar datos
    let userId = document.getElementById('delete_user_id').value
    let dataForm = new FormData()
    dataForm.append("userId",userId)
    fetch(
        `http://localhost/archivos/Proyecto_Fruver_Alterno/api/deleteUser.php`,{
            method: 'POST',
            body: dataForm
        }
    )
    .then(response => {
        this.getAllUsers()
        console.log(response)
        response.json()
    })
    .then(data =>{
        console.log(data)       
    });
      
  }
})