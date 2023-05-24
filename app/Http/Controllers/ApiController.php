<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{   
    /*-------------- Asesores methods --------------*/
    public function postAsesores (Request $request){
        $file = $request->file('files');
        $file = $file[0];
        $data = fopen($file, 'r');
        $fields = fgetcsv($data);
        $data_csv = [];


        // $db_fields = ['nombre', 'apellido_paterno', 'apellido_materno', 'email', 'telefono', 'rol', 'contrasenia'];
        $db_fields = ['name', 'apellido_paterno', 'apellido_materno', 'email', 'telefono', 'rol', 'password'];
        
        while(($line = fgetcsv($data)) !== false){ 
            $line[6] = Hash::make($line[6]);
            $data_csv[] = array_combine($db_fields, $line);
        }
        fclose($data);
        DB::table('users')->insert($data_csv);
        return response()->json(["Message: " => 'Data upload succesfully'], 200);
    }

    public function postAsesor ( Request $request ) {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $data = DB::table('users')->insert($data);
        return response(["message" => "Success"], 201);
    }

    /*------------ Clientes Methods --------------*/
    public function postClientes (Request $request){
        $file = $request->file('files');
        $file = $file[0];
        $data = fopen($file, 'r');
        $fields = fgetcsv($data);
        $data_csv = [];

        $db_fields = ['nombre', 'apellido_paterno', 'apellido_materno', 'email', 'telefono', 'clabe', 'numero_cuenta', 'numero_tarjeta', 'tipo_cuenta'];
        
        while(($line = fgetcsv($data)) !== false){ 
            $data_csv[] = array_combine($db_fields, $line);
        }
        fclose($data);
        DB::table('clientes')->insert($data_csv);
        return response()->json(["Message: " => 'Data upload succesfully'], 200);
    }

    public function getClient ( $identifier ){
        $client = DB::table('clientes')->where('clabe', $identifier)->first();
        if($client !== null){
            return response()->json(["data" => $client, "message" => "Success"], 200);
        }
        return response()->json(["data" => null, "message" => "Client not found"], 404);
    }
}
