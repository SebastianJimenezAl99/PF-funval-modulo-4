import axios from "axios";
import { useEffect, useState } from "react";


function divulario(props){
    const [rols, setRols] = useState([]);

    useEffect(() => {

        axios.get('http://127.0.0.1:8000/api/rol', {
          headers: {
            Authorization: `Bearer ${props.token}`,
          },
        }).then(response => {
          // Manejar la respuesta de la API
          console.log('resultado de api: ', response.data);
          setRols(response.data);
        })
        .catch(error => {
          console.error('Error al enviar la solicitud:', error);
        });
    }, []);

    function guadarDatos() {
        let InputNombre = document.getElementById('nom');
        let InputApellido = document.getElementById('ape');
        let InputUser = document.getElementById('user');
        let InputPass = document.getElementById('pass');
        let InputRol = document.getElementById('rol');

        const data = {
            usuario: InputUser.value,
            password: InputPass.value,
            primernombre: InputNombre.value,
            primerapellido: InputApellido.value,
            id_rol: InputRol.value
        };
        
        axios.post('http://127.0.0.1:8000/api/usuarios', data, {
            headers: {
                'Authorization': `Bearer ${props.token}`
            }
        })
            .then(response => {
              // Manejar la respuesta de la API
              console.log('respuesta api:', response.data);
            })
            .catch(error => {
              console.error('Error al enviar la solicitud:', error);
            });
    }


    return(
        <div className="bg-violet-200 p-8 max-w-md mx-auto rounded-md shadow-md mt-3">
            <h2 className="text-2xl font-bold mb-4">Formulario</h2>
            <div>
                <div className="mb-4">
                <label className="block text-gray-700 text-sm font-bold mb-2">
                    Nombre:
                    <input id="nom" type="text" name="primernombre" className="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
                </label>
                </div>
                <div className="mb-4">
                <label className="block text-gray-700 text-sm font-bold mb-2">
                    Apellido:
                    <input id="ape" type="text" name="primerapellido" className="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
                </label>
                </div>
                <div className="mb-4">
                <label className="block text-gray-700 text-sm font-bold mb-2">
                    Usuario:
                    <input id="user" type="text" name="usuario"
                    className="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    />
                </label>
                </div>
                <div className="mb-4">
                    <label className="block text-gray-700 text-sm font-bold mb-2">
                        Contraseña:
                        <input id="pass" type="password" name="password" className="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
                </label>
                </div>
                <div className="mb-4">
                <label className="block text-gray-700 text-sm font-bold mb-2">
                    Rol:
                    <select
                    id="rol"
                    name="rol"
                    
                    className="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    >
                    <option value="">Seleccionar Rol</option>
                    {
                        rols.map((fila, index) => (
                            <option key={index} value={fila.id_rol}>{fila.rol}</option>
                        ))
                    }
                    </select>
                </label>
                </div>
                <button onClick={() => {guadarDatos(),props.cambiarVista(1)}} className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Enviar</button>
                <button onClick={() => {props.cambiarVista(1)}} className="bg-gray-500 mx-3 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Cancelar</button>
            </div>
        </div>
    )
}

export default divulario;