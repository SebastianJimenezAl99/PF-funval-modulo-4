import axios from 'axios';

function Login(props) {

    const Login = () => {
        
        let InputUser = document.getElementById('user');
        let InputPass = document.getElementById('pass');

        const data = {
            usuario: InputUser.value,
            password: InputPass.value,
        };
        
        axios.post('http://127.0.0.1:8000/api/auth/login', data)
            .then(response => {
              // Manejar la respuesta de la API
              let respuesta = response.data
              console.log('token:', respuesta.access_token);
              props.funToken(respuesta.access_token);
              localStorage.setItem('token', respuesta.access_token);
            })
            .catch(error => {
              console.error('Error al enviar la solicitud:', error);
                
              Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Verifique su usuario y contraseña"
              });

            });
    };

    return(
        <div className="relative flex flex-col justify-center min-h-screen overflow-hidden">
        <div className="w-full p-6 m-auto bg-white rounded-md shadow-md lg:max-w-xl">
            <h1 className="text-3xl font-semibold text-center text-purple-700 underline">
               Sign in
            </h1>
            <div className="mt-6">
                <div className="mb-2">
                    <label htmlFor="Usuario" className="block text-sm font-semibold text-gray-800">Usuario</label>
                    <input type="text" name="Usuario" id="user" className="block w-full px-4 py-2 mt-2 text-purple-700 bg-white border rounded-md focus:border-purple-400 focus:ring-purple-300 focus:outline-none focus:ring focus:ring-opacity-40"/>
                </div>
                <div className="mb-2">
                    <label htmlFor="password"  className="block text-sm font-semibold text-gray-800">Contraseña</label>
                    <input type="password" id="pass" name="password" className="block w-full px-4 py-2 mt-2 text-purple-700 bg-white border rounded-md focus:border-purple-400 focus:ring-purple-300 focus:outline-none focus:ring focus:ring-opacity-40"/>
                </div>
                {/* <a
                    href="#"
                    className="text-xs text-purple-600 hover:underline"
                >
                    Forget Password?
                </a> */}
                <div className="mt-6">
                    <button onClick={Login} className="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transdiv bg-purple-700 rounded-md hover:bg-purple-600 focus:outline-none focus:bg-purple-600">Iniciar Sección</button>
                </div>
            </div>

            <p className="mt-8 text-xs font-light text-center text-gray-700">
                {" "} Dont have an account?{" "}<a href="#" className="font-medium text-purple-600 hover:underline">Sign up</a>
            </p>
        </div>
    </div>
    )
    
}

export default Login;