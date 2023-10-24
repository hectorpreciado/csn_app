<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Usuario extends Seeder
{
    public function run()
    {
        $name="Héctor";
        $appel="Preciado";
        $user="hector";
        $mail="hector.preciado@udgvirtual.udg.mx";
        $password=password_hash("123", PASSWORD_DEFAULT);
        $data = [
            'nombre'=>$name,
            'apellido'=>$appel,
            'username' => $user,
            'email'=>$mail,
            'password' => $password
        ];

        $this->db->table('usuarios')->insert($data);
    }
}
