<?php
use App\Models\Area;
/**
 * funcion generica para subir documentos al servidor
 * @return $target_path ruta del archivo
 */
function subirDocumento($archivo, $carpeta, $retornarName = null) {
    $tumb = '';
    $target_path = '';
    //Verifica si el archivo que carga en el ajax esta vacio
    if (!empty($_FILES[$archivo]['name'])) {
        $extencion = substr($_FILES[$archivo]['name'], -4, 4);
        //formato para el archivo
        $tumb = limpiarCaracteresString(date('Y_m_d H_i_s')."_" . $_FILES[$archivo]['name']);
        $tumb = str_replace(' ', '_', $tumb);
        if (strpos($carpeta, 'uploads'))
            $targetPath = $carpeta;
        else
            $targetPath = "./uploads/" . $carpeta;
        //rutas para guardar los archivos
        if (!file_exists($targetPath)) {
            mkdir($targetPath, 0777, true);
        }

        $target_path = $targetPath . '/' . $tumb;
        if (move_uploaded_file($_FILES[$archivo]['tmp_name'], $target_path)) {

        }
    }
    if ($retornarName != null) {
        return $tumb;
    } else
        return $target_path;
}
/**
 * funcion que remplaza las tildes en los nombres de los archivos
 * @return utf8_encode($cadena) cadena en formato utf8
 */
function sinTildes($cadena) {
    $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
    $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
    $cadena = utf8_decode($cadena);
    $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
    $cadena = strtolower($cadena);
    return utf8_encode($cadena);
}
/**
 * funcion que limpia a los caracteres
 * @return sinTildes($string) devuelve valor sin tildes
 */
function limpiarCaracteresString($string) {
    $no_permitidas = array("á", "é", "í", "ó", "ú", "Á", "É", "Í", "Ó", "Ú", "ñ", "À", "Ã", "Ì", "Ò", "Ù", "Ã™", "Ã ", "Ã¨", "Ã¬", "Ã²", "Ã¹", "ç", "Ç", "Ã¢", "ê", "Ã®", "Ã´", "Ã»", "Ã‚", "ÃŠ", "ÃŽ", "Ã”", "Ã›", "ü", "Ã¶", "Ã–", "Ã¯", "Ã¤", "«", "Ò", "Ã", "Ã„", "Ã‹");
    $permitidas = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "n", "N", "A", "E", "I", "O", "U", "a", "e", "i", "o", "u", "c", "C", "a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "u", "o", "O", "i", "a", "e", "U", "I", "A", "E");
    $string = htmlentities($string);
    $string = preg_replace('/\&(.)[^;]*;/', '\\1', $string);
    $string = str_replace(' ', '-', $string);
    $string = str_replace($no_permitidas, $permitidas, $string);
    return sinTildes($string);
}
/**
 * funcion que devuelve la lista de areas para filtrar en la vista principal
 */
function ListaAreas(){
    $areas=Area::all();
    return $areas;
}


?>
