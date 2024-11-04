

<!-- Multiple Upload Script  -->
<!-- ---- 7 VIDOES ----    
---- v4 ---------------------------------- 
Upload Multiples



---- v3 ---------------------------------- 
 errors 0 1 2 3 4 5 6


---- v2 ---------------------------------- 
$extentios = array("png", "jpg", "jpeg", "gif");

$extent_img = explode('.', $name_img);
$extent_img = strtolower(end($extent_img));
divise les affectation probleme (2 ligns)
------------------
["error"] sont les suivantes :
0 - Pas d'erreur, le fichier a été téléchargé avec succès.
1 - Le fichier dépasse la taille maximale autorisée par php.ini (upload_max_filesize).
2 - Le fichier dépasse la taille maximale autorisée par le formulaire HTML (MAX_FILE_SIZE).
3 - Le fichier a été partiellement téléchargé.
4 - Aucun fichier n'a été téléchargé.
6 - Dossier temporaire manquant.
7 - Échec de l'écriture du fichier sur le disque.
8 - Une extension PHP a arrêté le téléchargement du fichier.

-->
<!-- v1 ---------------------------------- -->
<!-- move_uploaded_file($name_tmp_name,"up\\".$name_img); -->









