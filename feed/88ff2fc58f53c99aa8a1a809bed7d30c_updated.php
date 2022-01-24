<?php
// +------------------------------------------------------------------------+
// | @author Deen Doughouz (DoughouzForest)
// | @author_url 1: http://www.wowonder.com
// | @author_url 2: http://codecanyon.net/user/doughouzforest
// | @author_email: wowondersocial@gmail.com   
// +------------------------------------------------------------------------+
// | WoWonder - The Ultimate Social Networking Platform
// | Copyright (c) 2016 WoWonder. All rights reserved.
// +------------------------------------------------------------------------+
header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

if (file_exists('assets/init.php')) {
    require 'assets/init.php';
} 

else {
    die('Please put this file in the home directory !');
}

$query = mysqli_query($sqlConnect, "ALTER TABLE `Wo_UserAds` 
    CHANGE `image` `ad_media` 
    VARCHAR(3000) CHARACTER SET 
    utf8mb4 COLLATE utf8mb4_general_ci 
    NOT NULL DEFAULT '';");
$query = mysqli_query($sqlConnect, "ALTER TABLE `Wo_Posts` ADD `postPhoto` VARCHAR(3000) 
    CHARACTER SET utf8 COLLATE utf8_general_ci 
    NOT NULL DEFAULT '' AFTER `postPlaying`;");
$query = mysqli_query($sqlConnect, "ALTER TABLE `Wo_Users` ADD `e_last_notif` VARCHAR(50) 
    CHARACTER SET utf8 COLLATE utf8_general_ci 
    NOT NULL DEFAULT '0' AFTER `e_profile_wall_post`;");
$query = mysqli_query($sqlConnect, "ALTER TABLE `Wo_Users` ADD `e_sentme_msg` 
    ENUM('0','1') CHARACTER SET utf8 
    COLLATE utf8_general_ci NOT NULL DEFAULT '0' 
    AFTER `e_profile_wall_post`;");

$query = mysqli_query($sqlConnect, "ALTER TABLE `Wo_Posts` ADD `postFileThumb` VARCHAR(3000)
    CHARACTER SET utf8 COLLATE utf8_general_ci 
    NOT NULL DEFAULT '' AFTER `postFileName`;");
$query = mysqli_query($sqlConnect, "ALTER TABLE `Wo_Posts` ADD `postPlaytube` VARCHAR(500) 
    CHARACTER SET utf8 COLLATE utf8_general_ci 
    NOT NULL DEFAULT '' AFTER `postSoundCloud`;");
$query = mysqli_query($sqlConnect, "INSERT INTO `Wo_Config` (`id`, `name`, `value`) 
    VALUES 
    (NULL, 'playtube_url', ''),
    (NULL, 'connectivitySystemLimit', '5000');");
$query = mysqli_query($sqlConnect, "INSERT INTO `Wo_Config` (`id`, `name`, `value`) VALUES (NULL, 'video_ad_skip', '6');");

$query = mysqli_query($sqlConnect, "INSERT INTO `Wo_Langs` (`id`, `lang_key`) VALUES (NULL, 'format_image');");
$query = mysqli_query($sqlConnect, "INSERT INTO `Wo_Langs` (`id`, `lang_key`) VALUES (NULL, 'format_video');");
$query = mysqli_query($sqlConnect, "INSERT INTO `Wo_Langs` (`id`, `lang_key`) VALUES (NULL, 'video');");
$query = mysqli_query($sqlConnect, "INSERT INTO `Wo_Langs` (`id`, `lang_key`) VALUES (NULL, 'video_player');");
$query = mysqli_query($sqlConnect, "INSERT INTO `Wo_Langs` (`id`, `lang_key`) VALUES (NULL, 'no_file_chosen');");
$query = mysqli_query($sqlConnect, "INSERT INTO `Wo_Langs` (`id`, `lang_key`) VALUES (NULL, 'choose_file');");
$query = mysqli_query($sqlConnect, "INSERT INTO `Wo_Langs` (`id`, `lang_key`) VALUES (NULL, 'media');");
$query = mysqli_query($sqlConnect, "INSERT INTO `Wo_Langs` (`id`, `lang_key`) VALUES (NULL, 'select_valid_img_vid');");
$query = mysqli_query($sqlConnect, "INSERT INTO `Wo_Langs` (`id`, `lang_key`) VALUES (NULL, 'select_valid_img');");
$query = mysqli_query($sqlConnect, "INSERT INTO `Wo_Langs` (`id`, `lang_key`) VALUES (NULL, 'select_valid_vid');");
$query = mysqli_query($sqlConnect, "INSERT INTO `Wo_Langs` (`id`, `lang_key`) VALUES (NULL, 'drop_img_here');");
$query = mysqli_query($sqlConnect, "INSERT INTO `Wo_Langs` (`id`, `lang_key`) VALUES (NULL, 'or');");
$query = mysqli_query($sqlConnect, "INSERT INTO `Wo_Langs` (`id`, `lang_key`) VALUES (NULL, 'browse_to_upload');");
$query = mysqli_query($sqlConnect, "INSERT INTO `Wo_Langs` (`id`, `lang_key`) VALUES (NULL, 'pr_completion')");
$query = mysqli_query($sqlConnect, "INSERT INTO `Wo_Langs` (`id`, `lang_key`) VALUES (NULL, 'ad_pr_picture')");
$query = mysqli_query($sqlConnect, "INSERT INTO `Wo_Langs` (`id`, `lang_key`) VALUES (NULL, 'add_ur_name')");
$query = mysqli_query($sqlConnect, "INSERT INTO `Wo_Langs` (`id`, `lang_key`) VALUES (NULL, 'ad_ur_workplace')");
$query = mysqli_query($sqlConnect, "INSERT INTO `Wo_Langs` (`id`, `lang_key`) VALUES (NULL, 'ad_ur_country')");
$query = mysqli_query($sqlConnect, "INSERT INTO `Wo_Langs` (`id`, `lang_key`) VALUES (NULL, 'ad_ur_address')");
$query = mysqli_query($sqlConnect, "INSERT INTO `Wo_Langs` (`id`, `lang_key`) VALUES (NULL, 'e_sent_msg')");
$query = mysqli_query($sqlConnect, "INSERT INTO `Wo_Langs` (`id`, `lang_key`) VALUES (NULL, 'send_money')");
$query = mysqli_query($sqlConnect, "INSERT INTO `Wo_Langs` (`id`, `lang_key`) VALUES (NULL, 'u_send_money')");
$query = mysqli_query($sqlConnect, "INSERT INTO `Wo_Langs` (`id`, `lang_key`) VALUES (NULL, 'available_balance')");
$query = mysqli_query($sqlConnect, "INSERT INTO `Wo_Langs` (`id`, `lang_key`) VALUES (NULL, 'send_to')");
$query = mysqli_query($sqlConnect, "INSERT INTO `Wo_Langs` (`id`, `lang_key`) VALUES (NULL, 'search_name_or_email')");
$query = mysqli_query($sqlConnect, "INSERT INTO `Wo_Langs` (`id`, `lang_key`) VALUES (NULL, 'money_sent_to')");
$query = mysqli_query($sqlConnect, "INSERT INTO `Wo_Langs` (`id`, `lang_key`) VALUES (NULL, 'sent_you')");
$query = mysqli_query($sqlConnect, "INSERT INTO `Wo_Langs` (`id`, `lang_key`) VALUES (NULL, 'amount_exceded')");
$query = mysqli_query($sqlConnect, "INSERT INTO `Wo_Langs` (`id`, `lang_key`) VALUES (NULL, 'custom_thumbnail')");
$query = mysqli_query($sqlConnect, "INSERT INTO `Wo_Langs` (`id`, `lang_key`) VALUES (NULL, 'cntc_limit_reached')");

$query = mysqli_query($sqlConnect, "UPDATE `Wo_Config` SET `value` = '" . time() . "' WHERE `name` = 'last_update'");
$query = mysqli_query($sqlConnect, "UPDATE `Wo_Config` SET `value` = '1.5.4' WHERE `name` = 'script_version'");

if (file_exists('.htaccess') && file_exists('htaccess.txt')) {
    $put = @file_put_contents('.htaccess', file_get_contents('htaccess.txt'));
}
$data  = array();
$query = mysqli_query($sqlConnect, "SHOW COLUMNS FROM `Wo_Langs`");
while ($fetched_data = mysqli_fetch_assoc($query)) {
    $data[] = $fetched_data['Field'];
}
unset($data[0]);
unset($data[1]);
function Wo_UpdateLangs($lang, $key, $value) {
    $update_query         = "UPDATE Wo_Langs SET `{lang}` = '{lang_text}' WHERE `lang_key` = '{lang_key}'";
    $update_replace_array = array(
        "{lang}",
        "{lang_text}",
        "{lang_key}"
    );
    return str_replace($update_replace_array, array(
        $lang,
        $value,
        $key
    ), $update_query);
}
$lang_update_queries = array();
foreach ($data as $key => $value) {
    $value = ($value);
    if ($value == 'arabic') {
        $lang_update_queries[] = Wo_UpdateLangs($value, 'format_image', 'تنسيق ملف الصورة');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'format_video', 'تنسيق ملف الفيديو');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'video', 'فيديو');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'video_player', 'مشغل فديوهات');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'no_file_chosen', 'لم تقم باختيار ملف');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'choose_file', 'اختر ملف');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'media', 'ملف وسائط');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'select_valid_img_vid', 'ملف الوسائط غير صالح. الرجاء تحديد صورة أو فيديو صالحين');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'select_valid_img', 'ملف الوسائط غير صالح. الرجاء تحديد صورة صالحة');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'select_valid_vid', 'ملف الوسائط غير صالح. الرجاء تحديد فيديو صالح');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'drop_img_here', 'إسقاط الصورة هنا');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'or', 'أو');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'browse_to_upload', 'تصفح لتحميل');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'pr_completion', 'الملف الشخصي الانتهاء');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'ad_pr_picture', 'إضافة صورة ملفك الشخصي');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'add_ur_name', 'أضف اسمك');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'ad_ur_workplace', 'أضف مكان عملك');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'ad_ur_country', 'أضف بلدك');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'ad_ur_address', 'أضف عنوانك');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'e_sent_msg', 'شخص أرسل لي رسالة');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'send_money', 'إرسال الأموال');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'u_send_money', 'يمكنك إرسال الأموال إلى أصدقائك، معارفك أو أي شخص');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'available_balance', 'الرصيد المتوفر');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'send_to', 'ارسل إلى');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'search_name_or_email', 'البحث عن اسم المستخدم، والبريد الإلكتروني');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'money_sent_to', 'تم إرسال أموالك بنجاح إلى');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'sent_you', 'ارسلت لك');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'amount_exceded', 'المبلغ المستحق رصيدك الحالي!');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'custom_thumbnail', 'صورة مصغرة مخصصة');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'cntc_limit_reached', 'لقد بلغت الحد المسموح به لعدد {{CNTC_LIMIT}} من الأصدقاء!');
    } else if ($value == 'dutch') {
        $lang_update_queries[] = Wo_UpdateLangs($value, 'format_image', 'Bestandsformaat afbeelding');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'format_video', 'Bestandsformaat video');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'video', 'Video');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'video_player', 'Video speler');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'no_file_chosen', 'Geen bestand gekozen');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'choose_file', 'Kies bestand');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'media', 'Media bestand');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'select_valid_img_vid', 'Mediabestand is ongeldig. Selecteer een geldige afbeelding of video');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'select_valid_img', 'Mediabestand is ongeldig. Selecteer een geldige afbeelding');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'select_valid_vid', 'Mediabestand is ongeldig. Selecteer een geldige video');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'drop_img_here', 'Zet hier een afbeelding neer');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'or', 'OF');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'browse_to_upload', 'Blader naar uploaden');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'pr_completion', 'Profiel voltooiing');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'ad_pr_picture', 'Voeg je profielfoto toe');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'add_ur_name', 'Voeg je naam toe');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'ad_ur_workplace', 'Voeg uw werkplek toe');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'ad_ur_country', 'Voeg uw land toe');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'ad_ur_address', 'Voeg uw adres toe');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'e_sent_msg', 'Iemand Stuur mij een bericht');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'send_money', 'Stuur geld');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'u_send_money', 'Je kunt geld sturen naar je vrienden, kennissen of wie dan ook');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'available_balance', 'Beschikbaar saldo');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'send_to', 'Verzenden naar');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'search_name_or_email', 'Zoeken naar gebruikersnaam, e-mail');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'money_sent_to', 'Uw geld is succesvol verzonden naar');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'sent_you', 'Stuurde je');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'amount_exceded', 'Het bedrag overschreed je huidige saldo!');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'custom_thumbnail', 'Aangepaste miniatuur');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'cntc_limit_reached', 'U heeft uw limiet van {{CNTC_LIMIT}} vrienden bereikt!');
    } else if ($value == 'french') {
        $lang_update_queries[] = Wo_UpdateLangs($value, 'format_image', 'Image au format du fichier');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'format_video', 'Format de fichier vidéo');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'video', 'Vidéo');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'video_player', 'Lecteur vidéo');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'no_file_chosen', 'Aucun fichier choisi');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'choose_file', 'Choisir le fichier');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'media', 'Fichier multimédia');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'select_valid_img_vid', 'Le fichier multimédia est invalide. Veuillez sélectionner une image ou une vidéo valide');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'select_valid_img', 'Le fichier multimédia est invalide. Veuillez sélectionner une image valide');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'select_valid_vid', 'Le fichier multimédia est invalide. Veuillez sélectionner une vidéo valide');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'drop_img_here', 'Déposer limage ici');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'or', 'OU');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'browse_to_upload', 'Parcourir pour télécharger');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'pr_completion', 'Achèvement du profil');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'ad_pr_picture', 'Ajouter votre photo de profil');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'add_ur_name', 'Ajoutez votre nom');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'ad_ur_workplace', 'Ajoutez votre lieu de travail');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'ad_ur_country', 'Ajoutez votre pays');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'ad_ur_address', 'Ajoutez votre adresse');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'e_sent_msg', 'Quelquun Envoyez moi un message');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'send_money', 'Envoyer de largent');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'u_send_money', 'Vous pouvez envoyer de largent à vos amis, connaissances ou nimporte qui');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'available_balance', 'Solde disponible');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'send_to', 'Envoyer à');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'search_name_or_email', 'Recherche de nom dutilisateur, e-mail');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'money_sent_to', 'Votre argent a été envoyé avec succès à');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'sent_you', 'Vous a envoyé');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'amount_exceded', 'Le montant a dépassé votre solde actuel!');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'custom_thumbnail', 'Miniature personnalisée');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'cntc_limit_reached', 'Vous avez atteint la limite de vos amis {{CNTC_LIMIT}}!');
    } else if ($value == 'german') {
        $lang_update_queries[] = Wo_UpdateLangs($value, 'format_image', 'Dateiformat Bild');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'format_video', 'Dateiformatvideo');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'video', 'Video');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'video_player', 'Videoplayer');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'no_file_chosen', 'Keine Datei ausgewählt');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'choose_file', 'Datei wählen');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'media', 'Mediendatei');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'select_valid_img_vid', 'Mediendatei ist ungültig. Bitte wählen Sie ein gültiges Bild oder Video aus');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'select_valid_img', 'Mediendatei ist ungültig. Bitte wählen Sie ein gültiges Bild');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'select_valid_vid', 'Mediendatei ist ungültig. Bitte wählen Sie ein gültiges Video aus');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'drop_img_here', 'Bild hier ablegen');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'or', 'ODER');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'browse_to_upload', 'Durchsuchen zum Hochladen');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'pr_completion', 'Profil Fertigstellung');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'ad_pr_picture', 'Fügen Sie Ihr Profilbild hinzu');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'add_ur_name', 'Fügen Sie Ihren Namen hinzu');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'ad_ur_workplace', 'Fügen Sie Ihren Arbeitsplatz hinzu');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'ad_ur_country', 'Fügen Sie Ihr Land hinzu');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'ad_ur_address', 'Fügen Sie Ihre Adresse hinzu');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'e_sent_msg', 'Jemand Senden Sie mir eine Nachricht');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'send_money', 'Geld schicken');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'u_send_money', 'Sie können Geld an Ihre Freunde, Bekannten oder irgendjemanden senden');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'available_balance', 'Verfügbares Guthaben');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'send_to', 'Senden an');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'search_name_or_email', 'Suchen Sie nach Benutzername, E-Mail');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'money_sent_to', 'Ihr Geld wurde erfolgreich an gesendet');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'sent_you', 'Hat dich geschickt');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'amount_exceded', 'Der Betrag übertraf Ihr aktuelles Guthaben!');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'custom_thumbnail', 'Benutzerdefiniertes Miniaturbild');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'cntc_limit_reached', 'Du hast dein Limit von {{CNTC_LIMIT}} Freunden erreicht!');
    } else if ($value == 'italian') {
        $lang_update_queries[] = Wo_UpdateLangs($value, 'format_image', 'Immagine del formato file');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'format_video', 'Formato file video');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'video', 'video');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'video_player', 'Lettore video');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'no_file_chosen', 'Nessun file scelto');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'choose_file', 'Scegli il file');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'media', 'File multimediale');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'select_valid_img_vid', 'Il file multimediale non è valido. Si prega di selezionare unimmagine o un video valido');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'select_valid_img', 'Il file multimediale non è valido. Si prega di selezionare unimmagine valida');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'select_valid_vid', 'Il file multimediale non è valido. Si prega di selezionare un video valido');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'drop_img_here', 'Rilascia limmagine qui');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'or', 'O');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'browse_to_upload', 'Sfoglia per caricare');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'pr_completion', 'Completamento del profilo');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'ad_pr_picture', 'Aggiungi la tua immagine del profilo');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'add_ur_name', 'Aggiungi il tuo nome');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'ad_ur_workplace', 'Aggiungi il tuo posto di lavoro');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'ad_ur_country', 'Aggiungi il tuo paese');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'ad_ur_address', 'Aggiungi il tuo indirizzo');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'e_sent_msg', 'Qualcuno Inviami un messaggio');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'send_money', 'Inviare soldi');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'u_send_money', 'Puoi inviare denaro ai tuoi amici, conoscenti o chiunque altro');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'available_balance', 'Saldo disponibile');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'send_to', 'Inviare a');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'search_name_or_email', 'Cerca nome utente, e-mail');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'money_sent_to', 'Il tuo denaro è stato inviato con successo');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'sent_you', 'Ti ho inviato');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'amount_exceded', 'Limporto ha superato il tuo saldo attuale!');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'custom_thumbnail', 'Miniatura personalizzata');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'cntc_limit_reached', 'Hai raggiunto il limite di {{CNTC_LIMIT}} amici!');
    } else if ($value == 'portuguese') {
        $lang_update_queries[] = Wo_UpdateLangs($value, 'format_image', 'Imagem do formato do arquivo');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'format_video', 'Vídeo do formato do arquivo');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'video', 'Vídeo');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'video_player', 'VideoPlayer');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'no_file_chosen', 'Nenhum arquivo selecionado');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'choose_file', 'Escolher arquivo');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'media', 'Arquivo de mídia');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'select_valid_img_vid', 'O arquivo de mídia é inválido. Selecione uma imagem ou vídeo válido');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'select_valid_img', 'O arquivo de mídia é inválido. Selecione uma imagem válida');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'select_valid_vid', 'O arquivo de mídia é inválido. Selecione um vídeo válido');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'drop_img_here', 'Largue a imagem aqui');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'or', 'OU');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'browse_to_upload', 'Navegue para carregar');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'pr_completion', 'Conclusão do perfil');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'ad_pr_picture', 'Adicione sua foto de perfil');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'add_ur_name', 'Adicione seu nome');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'ad_ur_workplace', 'Adicione seu local de trabalho');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'ad_ur_country', 'Adicione seu país');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'ad_ur_address', 'Adicione seu endereço');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'e_sent_msg', 'Alguém Envie-me uma mensagem');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'send_money', 'Enviar dinheiro');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'u_send_money', 'Você pode enviar dinheiro para seus amigos, conhecidos ou qualquer um');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'available_balance', 'Saldo disponível');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'send_to', 'Enviar para');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'search_name_or_email', 'Procure por nome de usuário, e-mail');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'money_sent_to', 'Seu dinheiro foi enviado com sucesso para');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'sent_you', 'Enviei a você');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'amount_exceded', 'O valor excedeu o seu saldo atual!');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'custom_thumbnail', 'Miniatura personalizada');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'cntc_limit_reached', 'Você atingiu seu limite de amigos {{CNTC_LIMIT}}!');
    } else if ($value == 'russian') {
        $lang_update_queries[] = Wo_UpdateLangs($value, 'format_image', 'Изображение формата файла');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'format_video', 'Формат файла видео');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'video', 'видео');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'video_player', 'Видео проигрыватель');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'no_file_chosen', 'Файл не выбран');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'choose_file', 'Выберите файл');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'media', 'Файл мультимедиа');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'select_valid_img_vid', 'Недопустимый файл мультимедиа. Выберите действительное изображение или видео');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'select_valid_img', 'Недопустимый файл мультимедиа. Выберите действительное изображение');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'select_valid_vid', 'Недопустимый файл мультимедиа. Выберите действительное видео');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'drop_img_here', 'Отбросьте изображение здесь');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'or', 'ИЛИ');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'browse_to_upload', 'Просмотр загрузки');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'pr_completion', 'Завершение профиля');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'ad_pr_picture', 'Добавьте свое фото профиля');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'add_ur_name', 'Добавьте свое имя');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'ad_ur_workplace', 'Добавьте свое рабочее место');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'ad_ur_country', 'Добавьте свою страну');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'ad_ur_address', 'Добавьте свой адрес');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'e_sent_msg', 'Кто-нибудь Послать мне сообщение');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'send_money', 'Отправлять деньги');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'u_send_money', 'Вы можете отправлять деньги своим друзьям, знакомым или кому-либо');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'available_balance', 'Доступные средства');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'send_to', 'Отправить');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'search_name_or_email', 'Поиск имени пользователя, электронной почты');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'money_sent_to', 'Ваши деньги были успешно отправлены');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'sent_you', 'Отправлено Вам');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'amount_exceded', 'Сумма превысила ваш текущий баланс!');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'custom_thumbnail', 'Пользовательская миниатюра');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'cntc_limit_reached', 'Вы достигли своего предела {{CNTC_LIMIT}} друзей!');
    } else if ($value == 'spanish') {
        $lang_update_queries[] = Wo_UpdateLangs($value, 'format_image', 'Imagen de formato de archivo');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'format_video', 'Formato de archivo video');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'video', 'Vídeo');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'video_player', 'Reproductor de video');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'no_file_chosen', 'Ningún archivo elegido');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'choose_file', 'Elija el archivo');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'media', 'Archivo multimedia');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'select_valid_img_vid', 'El archivo multimedia no es válido. Seleccione una imagen o video válido');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'select_valid_img', 'El archivo multimedia no es válido. Seleccione una imagen válida');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'select_valid_vid', 'El archivo multimedia no es válido. Seleccione un video válido');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'drop_img_here', 'Dejar caer la imagen aquí');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'or', 'O');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'browse_to_upload', 'Buscar para cargar');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'pr_completion', 'Terminación del perfil');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'ad_pr_picture', 'Agrega tu foto de perfil');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'add_ur_name', 'Agrega tu nombre');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'ad_ur_workplace', 'Agregue su lugar de trabajo');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'ad_ur_country', 'Agrega tu país');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'ad_ur_address', 'Agrega tu dirección');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'e_sent_msg', 'Alguien me envía un mensaje');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'send_money', 'Enviar dinero');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'u_send_money', 'Puede enviar dinero a sus amigos, conocidos o cualquier persona');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'available_balance', 'Saldo disponible');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'send_to', 'Enviar a');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'search_name_or_email', 'Buscar nombre de usuario, correo electrónico');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'money_sent_to', 'Su dinero fue enviado exitosamente a');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'sent_you', 'Enviado');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'amount_exceded', '¡La cantidad excedió su saldo actual!');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'custom_thumbnail', 'Miniatura personalizada');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'cntc_limit_reached', '¡Has alcanzado el límite de {{CNTC_LIMIT}} amigos!');
    } else if ($value == 'turkish') {
        $lang_update_queries[] = Wo_UpdateLangs($value, 'format_image', 'Dosya Biçimi resmi');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'format_video', 'Dosya Biçimi videosu');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'video', 'Video');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'video_player', 'Video oynatıcı');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'no_file_chosen', 'Dosya seçili değil');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'choose_file', 'Dosya seçin');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'media', 'Medya dosyası');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'select_valid_img_vid', 'Medya dosyası geçersiz. Lütfen geçerli bir resim veya video seçin');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'select_valid_img', 'Medya dosyası geçersiz. Lütfen geçerli bir resim seçin');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'select_valid_vid', 'Medya dosyası geçersiz. Lütfen geçerli bir video seçin');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'drop_img_here', 'Buraya Resim Aç');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'or', 'VEYA');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'browse_to_upload', 'Yüklemeye Gözat');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'pr_completion', 'Profil Tamamlama');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'ad_pr_picture', 'Profil resmini ekle');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'add_ur_name', 'Adınızı ekleyin');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'ad_ur_workplace', 'İş yerinizi ekleyin');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'ad_ur_country', 'Ülkenizi ekle');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'ad_ur_address', 'Adresinizi ekleyin');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'e_sent_msg', 'Birisi bana bir mesaj gönder');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'send_money', 'Para göndermek');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'u_send_money', 'Arkadaşlarınız, tanıdıklarınız veya herhangi birisine para gönderebilirsiniz.');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'available_balance', 'Kalan bakiye');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'send_to', 'Gönderildi');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'search_name_or_email', 'Kullanıcı adını, e-postasını ara');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'money_sent_to', 'Paranız başarıyla gönderildi');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'sent_you', 'Seni gönderdi');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'amount_exceded', 'Miktar, şu anki bakiyenizi aştı!');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'custom_thumbnail', 'Özel Küçük Boy');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'cntc_limit_reached', '{{CNTC_LIMIT}} arkadaşınızla ilgili sınırınıza ulaştınız!');
    } else if ($value == 'english') {
        $lang_update_queries[] = Wo_UpdateLangs($value, 'format_image', 'File Format image');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'format_video', 'File Format video');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'video', 'Video');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'video_player', 'VideoPlayer');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'no_file_chosen', 'No file chosen');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'choose_file', 'Choose File');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'media', 'Media File');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'select_valid_img_vid', 'Media file is invalid. Please select a valid image or video');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'select_valid_img', 'Media file is invalid. Please select a valid image');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'select_valid_vid', 'Media file is invalid. Please select a valid video');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'drop_img_here', 'Drop Image Here');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'or', 'OR');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'browse_to_upload', 'Browse To Upload');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'pr_completion', 'Profile Completion');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'ad_pr_picture', 'Add your profile picture');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'add_ur_name', 'Add your name');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'ad_ur_workplace', 'Add your workplace');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'ad_ur_country', 'Add your country');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'ad_ur_address', 'Add your address');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'e_sent_msg', 'Someone sent me a message');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'send_money', 'Send money');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'u_send_money', 'You can send money to your friends, acquaintances or anyone');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'available_balance', 'Available balance');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'send_to', 'Send To');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'search_name_or_email', 'Search for user name, e-mail');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'money_sent_to', 'Your money was successfully sent to');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'sent_you', 'sent you');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'amount_exceded', 'The amount exceded your current balance!');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'custom_thumbnail', 'Custom Thumbnail');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'cntc_limit_reached', 'You have reached your limit of {{CNTC_LIMIT}} friends!');
    } else if ($value != 'english') {
        $lang_update_queries[] = Wo_UpdateLangs($value, 'format_image', 'File Format image');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'format_video', 'File Format video');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'video', 'Video');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'video_player', 'VideoPlayer');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'no_file_chosen', 'No file chosen');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'choose_file', 'Choose File');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'media', 'Media File');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'select_valid_img_vid', 'Media file is invalid. Please select a valid image or video');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'select_valid_img', 'Media file is invalid. Please select a valid image');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'select_valid_vid', 'Media file is invalid. Please select a valid video');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'drop_img_here', 'Drop Image Here');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'or', 'OR');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'browse_to_upload', 'Browse To Upload');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'pr_completion', 'Profile Completion');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'ad_pr_picture', 'Add your profile picture');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'add_ur_name', 'Add your name');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'ad_ur_workplace', 'Add your workplace');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'ad_ur_country', 'Add your country');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'ad_ur_address', 'Add your address');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'e_sent_msg', 'Someone sent me a message');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'send_money', 'Send money');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'u_send_money', 'You can send money to your friends, acquaintances or anyone');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'available_balance', 'Available balance');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'send_to', 'Send To');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'search_name_or_email', 'Search for user name, e-mail');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'money_sent_to', 'Your money was successfully sent to');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'sent_you', 'Sent you');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'amount_exceded', 'The amount exceded your current balance!');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'custom_thumbnail', 'Custom Thumbnail');
        $lang_update_queries[] = Wo_UpdateLangs($value, 'cntc_limit_reached', 'You have reached your limit of {{CNTC_LIMIT}} friends!');
    }
}

if (!empty($lang_update_queries)) {
    foreach ($lang_update_queries as $key => $query) {
        $sql = mysqli_query($sqlConnect, $query);
    }
}

echo 'The script is successfully updated to v1.5.4!';
$name = md5(microtime()) . '_updated.php';
rename('update.php', $name);
exit();