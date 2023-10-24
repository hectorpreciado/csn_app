<?php

namespace App\Controllers;

use App\Models\Appmodel;

class Users extends BaseController
{
    public function index()
    {
        return view('home');
    }
    public function inicio() {
        $mensaje=session('mensaje');
        $model=new Appmodel();
        $datos=$model->listar();
        $data=["datos"=>$datos];
        return view('listado', $data);
    }
    public function login()
    {
        $usuario = $this->request->getPost('username');
        $password= $this->request->getPost('password');

        $model=new Appmodel();
        $datosUsuario= $model->obtenerUsuario(['username'=>$usuario]);

        if (count($datosUsuario) > 0 &&
        password_verify($password, $datosUsuario[0]['password'])) {

            $data=[ 'username'=>$datosUsuario[0]['username'] ];
            $session=session();
            $session->set($data);
            return redirect()->to(base_url('/inicio'))->with('mensaje', '1');
        } else {
            return redirect()->to(base_url('/'))->with('mensaje', '0');
        }
    
    }
    public function salir()
    {
        $session=session();
        $session->destroy();
        return redirect()->to(base_url('/'));
    }
    public function agregar()
    {
        $image=$_FILES['archivo']['tmp_name'];
        $imgContenido=addslashes(file_get_contents($image));
         
        $archivo=[
            "imagen"=>$imgContenido,
            "nombre"=>$image,
            "usuario"=>session('username'),
        ];
        $model= new Appmodel();
        $respuesta=$model-> insertar($archivo);
        return redirect()->to(base_url().'/inicio');
    }
    public function editar($id)
    {
        $data=["idimagenes"=> $id];
        $model= new Appmodel();
        $respuesta = $model->editar($data);
        $datos=["datos"=>$respuesta];

         
        echo view('actualizar', $datos);
        ;
    }
    public function actualizar()
    {
        $image=$_FILES['archivo']['tmp_name'];
        $imgContenido=addslashes(file_get_contents($image));
        $datos = [
            "idimagenes"=>$_POST['id'],
            "imagen"=>$imgContenido,
            "nombre"=>$image,
            "usuario"=>session('username'),
        ];
        $id=$_POST['id'];

        $model= new Appmodel();
        $respuesta=$model->actualizar($datos, $id);
        return redirect()->to(base_url().'/inicio');
    }
    public function eliminar($id)
    {
        $model= new Appmodel();
        $data= ["idimagenes"=>$id];
        $respuesta=$model->eliminar($data);
        return redirect()->to(base_url().'/inicio');
    }
    public function newus()
    {
        $nombre = $this->request->getPost('nombre');
        $apellido = $this->request->getPost('apellido');
        $email = $this->request->getPost('email');
        $usuario = $this->request->getPost('username');
        $password= $this->request->getPost('password');
        $arraynew=array($nombre, $apellido, $usuario, $email,$password);

        $model = new Appmodel();
        $new_user=$model->newus($arraynew);
    }
}