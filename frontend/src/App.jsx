import { useState } from 'react'

import './App.css'
import Login from './componentes/Login'
import axios from 'axios';
import Dashboard from './componentes/Dashboard';

function App() {
  const [token, setToken] = useState('');

  const UpdateToken = (valor) => {
    setToken(valor);
  }

  const logout = () =>{
    const data = {
      token: token,
    };

    axios.post('http://127.0.0.1:8000/api/auth/logout', data)
      .then(response => {
        // Manejar la respuesta de la API
        
        console.log('resultado de la api: ', response.data);
        UpdateToken('');
      })
      .catch(error => {
        console.error('Error al enviar la solicitud:', error);
      });
  }

  return (
    <>
      {token ? (
        // Renderizar contenido cuando hay un token
        <Dashboard 
          logout={logout}
          token={token}
        />
       
      ) : (
        // Renderizar el componente de Login cuando no hay un token
        <Login
          funToken={UpdateToken}
        />
      )}
    </>
  )
}

export default App
