import { useState } from "react";
import Lista from "./Lista";
import Formulario from "./Formulario";


function Dashboard(props){
    const [vistaCrear, setVistaCrear ] = useState(false);
    const [vistaDashboard, setVistaDashboard ] = useState(true);
    const [vistaEditar, setVistaEditar ] = useState(false);
    const [idEditar, setIdEditar ] = useState(null);
    

    function cambiarVista(op,id) {
        if (op == 1) {
            setVistaDashboard(true);
            setVistaCrear(false);
            setVistaEditar(false);
            setIdEditar(null);
        }else if(op == 2){
            setVistaDashboard(false);
            setVistaCrear(true);
            setVistaEditar(false);
            setIdEditar(null);
        }else if(op == 3){
            setVistaDashboard(false);
            setVistaCrear(false);
            setVistaEditar(true);
            setIdEditar(id);
        }else{
            setVistaDashboard(false);
            setVistaCrear(false);
            setVistaEditar(false);
        }
    }

    if (vistaDashboard) {
        return (
            <div className="w-screen h-screen">
                
                <nav className="px-8 py-4 flex justify-between bg-purple-700 text-white">
                    <h2>Logo</h2>
                    <button onClick={props.logout}>Cerrar Seccion</button>
                </nav>
                <div className="px-8 py-4 bg-violet-200 h-full">
                    <div className="w-full flex justify-between">
                        <h1 className="font-bold text-xl">Dashboard</h1>
                        <button className="bg-green-600 text-white px-5 py-2 rounded hover:bg-green-700" onClick={() => {cambiarVista(2)}}>Crear Usuario</button>
                    </div>
                   
                    <Lista 
                    token={props.token}
                    cambiarVista={cambiarVista}
                    />
                </div>
                
            </div>
        )
    }else if (vistaCrear) {
        return (
            <div>
                <nav className="px-8 py-4 flex justify-between bg-purple-700 text-white">
                    <h2>Logo</h2>
                    <button onClick={props.logout}>Cerrar Seccion</button>
                </nav>
                <Formulario 
                    cambiarVista={cambiarVista}
                    token={props.token}
                />
            </div>
            
        )
    }else if (vistaEditar) {
        return (
            <div>
                <nav className="px-8 py-4 flex justify-between bg-purple-700 text-white">
                    <h2>Logo</h2>
                    <button onClick={props.logout}>Cerrar Seccion</button>
                </nav>
                <h1>Vista para editar</h1>
            </div>
        )
    }else{
        return (
            <div>
                
            </div>
        )
    }
   
}

export default Dashboard;