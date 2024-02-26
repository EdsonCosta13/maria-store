<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    private function gerarNomeDocumento( $tipo = '' )
    {
        $dir = $this->getDirDocumentoStr( $tipo );
        $encoded = $dir.md5( date('Y-m-d_H:i:s') );
        return $encoded.'.pdf';
    }




    private function getLogotipo()
    {
        $path = public_path().'/logo.png';
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        return $base64;
    }


    public function uploadFile( $request , $name_request, $folder  )
    {
        Log::debug( "0. Controller.uploadFile() : ".$name_request );
        $base = $this->criarDirectorios( $folder );
        $file_item = $request->file( $name_request );
        $file_name = '';
        Log::debug( "1. Controller.uploadFile() : ".$base );

        if( $file_item->isValid() )
        {
            $extension = $file_item->getClientOriginalExtension();
            $file_name = md5( date('Y-m-dH:m:s').'-'.$name_request ).'.'.$extension;
            $file_item->move( $base, $file_name);
        }
        return $folder.DIRECTORY_SEPARATOR.$file_name;
    }


    public function uploadImage( $disk , Request $request, $file_name_request, $folder )
    {
        // Get filename with the extension
        $filenameWithExt = $request->file( $file_name_request )->getClientOriginalName();
        //Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get just ext
        $extension = $request->file( $file_name_request )->getClientOriginalExtension();
        // Filename to store
        $fileNameToStore = time().'.'.$extension;
        // Upload Image

        $file = $request->file( $file_name_request );
        $path = $request->file( $file_name_request )->storeAs( $folder, $fileNameToStore);

        if( !Storage::disk( $disk )->put( $request->file( $file_name_request ), 'Contents' ) )
            return false;
        return $path;
    }


    private function isWindows()
    {
        if (strncasecmp(PHP_OS, 'WIN', 3) == 0)
            return true;
        return false;
    }

    public function criarDirectorios( $path )
    {
        $folders = array();
        if ( $this->isWindows() ) {
            $path = str_replace( '/', '\\', $path );
            $folders = explode('\\', $path );
        }
        else
            $folders = explode('/', $path );

        $currentDir = public_path();
        foreach( $folders as $key=>$folder )
        {
            $currentDir .= $this->isWindows() ? DIRECTORY_SEPARATOR.$folder : DIRECTORY_SEPARATOR.$folder ;
            if ( !file_exists( $currentDir ) && $folder  && $folder != '' )
            {
                mkdir( $currentDir );
                chmod( $currentDir, 0755 );
            }
        }
        return $currentDir;
    }


    public function uploadFileFromBase64( $request ,$name_request, $folder  )
    {
        $encoded64 = json_decode( $request->input( $name_request ) );
        $base = $this->criarDirectorios( $folder );

        $file_name = md5( date('Y-m-dH:m:s').'-'.$name_request );
        $file = $base.DIRECTORY_SEPARATOR.$file_name;
        $type = 'png';
        $data = '';

        if (preg_match('/^data:image\/(\w+);base64,/', $encoded64, $type)) {

            $data = substr($encoded64, strpos($encoded64, ',') + 1);
            $type = strtolower($type[1]); // jpg, png, gif

            if (!in_array($type, [ 'jpg', 'jpeg', 'gif', 'png' ])) {
                throw new \Exception('Tipo de imagem inválido.');
            }
            $data = str_replace( ' ', '+', $encoded64 );
            $data = base64_decode($encoded64);

            if ($data === false) {
                throw new \Exception('Falha ao decodificar o arquivo.');
            }
            file_put_contents($file.".{$type}", $data);
        } else {
            throw new \Exception('did not match data URI with image data');
        }

        return $file.".{$type}";
    }
}
