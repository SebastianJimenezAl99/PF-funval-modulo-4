import axios from "axios";
import { useEffect, useState } from "react";

function Lista(props) {
  const [usuarios, setUsuarios] = useState([]);

  useEffect(() => {

    axios.get('http://127.0.0.1:8000/api/usuarios', {
      headers: {
        Authorization: `Bearer ${props.token}`,
      },
    }).then(response => {
      // Manejar la respuesta de la API
      console.log('resultado de api: ', response.data);
      setUsuarios(response.data);
    })
    .catch(error => {
      console.error('Error al enviar la solicitud:', error);
    });
  }, []);

  const titulos = ['Id_user','Nombre','Apellido','Usuario','Habilitado','Fecha','Rol','Acciones'];

  function confirmacionElimanar(id_user,id_persona) {
    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!"
    }).then((result) => {
      if (result.isConfirmed) {

        eliminar(id_user,id_persona);
        Swal.fire({
          title: "Deleted!",
          text: "Your file has been deleted.",
          icon: "success"
        });
      }
    });
  }

  function eliminar(id_user,id_persona) {

    axios.delete('http://127.0.0.1:8000/api/usuarios/'+id_user, {
      headers: {
        Authorization: `Bearer ${props.token}`,
      },
    }).then(response => {
      // Manejar la respuesta de la API
      console.log('resultado de api: ', response.data);
    })
    .catch(error => {
      console.error('Error al enviar la solicitud:', error);
    });

    axios.delete('http://127.0.0.1:8000/api/personas/'+id_persona, {
      headers: {
        Authorization: `Bearer ${props.token}`,
      },
    }).then(response => {
      // Manejar la respuesta de la API
      console.log('resultado de api: ', response.data);
    })
    .catch(error => {
      console.error('Error al enviar la solicitud:', error);
    });

    axios.get('http://127.0.0.1:8000/api/usuarios', {
      headers: {
        Authorization: `Bearer ${props.token}`,
      },
    }).then(response => {
      // Manejar la respuesta de la API
      console.log('resultado de api: ', response.data);
      setUsuarios(response.data);
    })
    .catch(error => {
      console.error('Error al enviar la solicitud:', error);
    });

  }

  return (
    <div className="max-w-7xl mx-auto p-4">
      <table className="w-full border border-collapse border-purple-700">
        <thead>
          <tr className="bg-purple-700 text-white">
            {titulos.map((element, index) => (
              <th key={index} className="border border-purple-700 p-2">
                {element}
              </th>
            ))}
          </tr>
        </thead>
        <tbody>
        {usuarios.map((fila, index) => (
          <tr
            key={index}
            className={`${
              index % 2 === 0 ? 'bg-violet-200' : 'bg-white'
            } text-black`}
          >
            <td className="border border-purple-700 p-2">{fila.id_user}</td>
            <td className="border border-purple-700 p-2">{fila.persona.primernombre}</td>
            <td className="border border-purple-700 p-2">{fila.persona.primerapellido}</td>
            <td className="border border-purple-700 p-2">{fila.usuario}</td>
            <td className="border border-purple-700 p-2">{fila.habilitado}</td>
            <td className="border border-purple-700 p-2">{fila.fecha}</td>
            <td className="border border-purple-700 p-2">{fila.rol.rol}</td>
            <td className="border border-purple-700 p-2 flex justify-around">
              <button><i onClick={() => {props.cambiarVista(3,fila.id_user)}} className="fa-solid fa-pen-to-square text-yellow-600"></i></button>
              <button onClick={() => {confirmacionElimanar(fila.id_user,fila.persona.id_persona)}}><i className="fa-solid fa-trash text-red-500"></i></button>
            </td>
          </tr>
        ))}
      </tbody>
      </table>
    </div>
  );
}

export default Lista;