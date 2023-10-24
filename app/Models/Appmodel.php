<?php namespace APP\Models;

use CodeIgniter\Model;

class Appmodel extends Model
{
    public function obtenerUsuario($data)
    {
       $Usuario=$this->db->table('usuarios');
       $Usuario->where($data);
       return $Usuario->get()->getResultArray();
    }
    public function insertar($archivo) {
        $imagen=$this->db->table('imagenes');
        $imagen->insert($archivo);

        return $this->db->insertID();
    }
    public function listar() {
        $array=['usuario'=>session('username')];
        $imagen=$this->db->table('imagenes');
        $imagen->where($array);
        return $imagen->get()->getResultArray();

    }
    public function editar($data)
    {
        $model= $this->db->table('imagenes');
        $model->where($data);
        return $model->get()->getResultArray();
    }
    public function actualizar($datos, $id)
    {
        $model=$this->db->table('imagenes');
        $model->set($datos);
        $model-> where('idimagenes', $id);
        return $model->update();
    }
    public function eliminar($data)
    {
        $model=$this->db->table('imagenes');
        $model->where($data);
        return $model->delete();
        
    }
    public function newus($arraynew)
    {
        $newuser=$this->db->table('usuarios');
        $newuser->insert($arraynew);
        
        return $this->db->insertID();
    }
}