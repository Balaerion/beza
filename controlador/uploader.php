<?php
    include_once("../../modelo/Foto.php");

    function UploadFiles($Name,$idProducto){
        $oFoto = new Foto();
        
        for($i = 0; $i < count($_FILES['file_img']['name']); $i++)
            {
                $filetmp = $_FILES["file_img"]["tmp_name"][$i];
                $filename = $_FILES["file_img"]["name"][$i];
                $filetype = $_FILES["file_img"]["type"][$i];
                $filepath = "../../img/".$Name.$i.".jpg";
            
                move_uploaded_file($filetmp,$filepath);

            $oFoto->setNombre($Name.$i);
            $oFoto->setidproducto($idProducto);
            $oFoto->insertar();
            }
    }

    function DeleteFiles ($oidProducto){
        $oFoto = new Foto();
        $oFoto->setidproducto($oidProducto);
        $oFoto->borrar();
    }
?>

