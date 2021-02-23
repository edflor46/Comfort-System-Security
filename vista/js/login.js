/* -------------------------------------------------------------------------- */
/*                                    Focus                                   */
/* -------------------------------------------------------------------------- */
let inputs = document.querySelectorAll('.form__input-login')

/* -------------------------------------------------------------------------- */
/*                                  AddFocus                                  */
/* -------------------------------------------------------------------------- */
function focusOn() {
    let parent = this.parentNode.parentNode
    parent.classList.add('focus')
}

/* -------------------------------------------------------------------------- */
/*                                 RemoveFocus                                */
/* -------------------------------------------------------------------------- */
function focusOff() {
    let parent = this.parentNode.parentNode

    if (this.value === '') {
        parent.classList.remove('focus')
    }
}

/* -------------------------------------------------------------------------- */
/*                             Invocuar funciones                             */
/* -------------------------------------------------------------------------- */

inputs.forEach(input => {
    input.addEventListener('focus', focusOn)
    input.addEventListener('blur', focusOff)
})

/* -------------------------------------------------------------------------- */
/*                                 Validacion                                 */
/* -------------------------------------------------------------------------- */



// const formulario = document.querySelector('#form__login')

// const login = (e) =>{
//     e.preventDefault();

//   let usuario = document.querySelector('#login_usuario').value;
//   let password = document.querySelector('#password_login').value;

//   if (usuario === '' || password === '') {
//     Swal.fire({
//         title: '!Error!',
//         text: 'Usuario o contraseña invalidos',
//         icon: 'error',
//         confirmButtonText: 'Ok'
//       })
//   } else{

//     let datos = new FormData()
//     datos.append('usuario', usuario)
//     datos.append('password', password)

//     $.ajax({
//         url: 'controladores/usuarios.controlador.php',
//         method:'POST',
//         data: datos,
//         cache:false,
//         contentType: false,
//         processData: false,
//         dataType: 'json',
//         success: function(response){
//             console.log(response);
//         }
//     })

//   }
// }

// formulario.addEventListener('submit', login)







// const formulario = document.getElementById('form__login')
// const alerta__usuario = document.getElementById('alert__usuario')
// const alerta__password = document.getElementById('alert__password')
// const alerta__form = document.querySelector('.error__form')

// const expresiones_regulares = {
//     usuario: /^[a-zA-Z0-9\_\-]{4,16}$/,
//     password: /^.{4,12}$/
// }

// const campos = {
//     usuario: false,
//     password: false
// }

// const validarFormulario = (e) => {

//     switch (e.target.name) {

//         case 'usuario__login':
//             if (!expresiones_regulares.usuario.test(e.target.value)) {
                
//                 alerta__usuario.classList.add('activar_alerta')
//             } else {
//                 alerta__usuario.classList.remove('activar_alerta')
//                 campos['usuario'] = true;
//                 campos['usuario'] = false;
//             }
//             break;
//         case 'password__login':

//             if (!expresiones_regulares.password.test(e.target.value)) {
//                 alerta__password.classList.add('activar_alerta')
//             } else {
//                 alerta__password.classList.remove('activar_alerta')
//                 campos['password'] = true;
//                 campos['password'] = false;
//             }
//             break;


//     }

// }

// inputs.forEach((input) => {
//     input.addEventListener('keyup', validarFormulario)
//     input.addEventListener('blur', validarFormulario)
// })
// formulario.addEventListener('submit', (e) => {
//     e.preventDefault();

//     if (campos.usuario && campos.password) {

     

//         // let usuario = $(this).val()
//         // let password = $(this).val()

//         // var datos = new FormData()
//         // datos.append('usuario', usuario)
//         // datos.append('password', password)

//         // console.log(datos);

//         // alerta__form.classList.remove('activar_alerta')
//         alert('ok');
        
//     } else {
       
//         alerta__form.classList.add('activar_alerta')
//         setTimeout( () =>{
//             alerta__form.classList.remove('activar_alerta')
//         }, 2500)
         
//     }

// })

