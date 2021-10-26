<?php
class Anuncios {
    public function getMeusAnuncios(){
        global $pdo;

        $array = array();
        $sql = $pdo->prepare("SELECT *,
         (select anuncios_images.url from anuncios_images.url where anuncios_images
         .id_anuncio = anuncio.id limit 1) as url 
         FROM anuncios WHERE id_usuario= :id_usuario");
        $sql->bindValue(":id_usuario", $_SESSION['cLogin']);
        $sql->execute();

        if($sql->rowCount()>0){
            $array = $sql->fetchAll();
        }

        return $array;
    }
}
?>