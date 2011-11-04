<?PHP
//test
//wird nicht mehr benötigt
$dirChangePictures = "./fotos/wechselnde_bilder";
$picture_top['default'] = "./fotos/werkstatt.jpg";
$picture_top['cv_frank'] = "./fotos/frank.jpg";
$picture_top['cv_jean'] = "./fotos/jean.jpg";
$picture_top['cv_corinne'] = "./fotos/corinne.jpg";
$picture_top['organigramm'] = "./fotos/mitarbeiter_lustig.jpg";
$picture_top['cv'] = "./fotos/mitarbeiter_lustig.jpg";
$picture_top['infrastruktur'] = "./fotos/werkstatt.jpg";
$picture_top['geschichte'] = "./fotos/werkstatt.jpg";
$picture_top['philosophie'] = "./fotos/werkstatt.jpg";
$picture_top['energieverteilung'] = "./fotos/energieverteilung.jpg";
$picture_top['ref_energieverteilung'] = "./fotos/energieverteilung.jpg";
$picture_top['cv_christan'] = "./fotos/christian.jpg";
$picture_top['cv_praktikant'] = "./fotos/christian.jpg";
$picture_top['cv_stephan'] = "./fotos/stephan.jpg";
$picture_top['cv_renato'] = "./fotos/renato.jpg";
$picture_top['hausverteilung'] = "./fotos/hausverteilungen.jpg";
$picture_top['gebaeudeautomation'] = "./fotos/gebaudeautomation.jpg";
$picture_top['haustechnik'] = "./fotos/haustechnik.jpg";
$picture_top['sanitaeranlage'] = "./fotos/sanitaer.jpg";
$picture_top['strassentunnel'] = "./fotos/strassentunnel.jpg";
$picture_top['baufirma'] = "./fotos/baufirma.jpg";
$picture_top['spezialanlage'] = "./fotos/spezialanlage.jpg";
$picture_top['elektrobrennstempel'] = "./fotos/brennstempel.jpg";
$picture_top['automation'] = "./fotos/automation.jpg";
$picture_top['industrie'] = "./fotos/industrie.jpg";

$menu_class[1] = 'm1';
$menu_class[2] = 'm2';
$menu_class[3] = 'm3';
$menu_class[4] = 'm4';

$g_path_cfg = "./cfg";
$g_path_bin = "./bin";
$g_path_lib = "./lib";

$g_cfg_username[1] = 'admin';
$g_cfg_password[1] = 'etk01';
$g_cfg_username[2] = 'zugji';
$g_cfg_password[2] = 'zug';
$g_cfg_username[3] = 'frank';
$g_cfg_password[3] = 'Ftk70';

$cfg_ftp_host = 'www.rhone.ch';
$cfg_ftp_un = 'kalbjean';
$cfg_ftp_pw = 'jvd88p6c';

/*
 * PICASA user
 */
$google_picasa_log = "log/google_picasa.log";
//$google_picasa_user = 'christian.lochmatter@gmail.com';
//$google_picasa_pass = 'k74tmere$';
$google_picasa_user = 'etkag00@gmail.com';
$google_picasa_pass = 'etkag-SRV';

$g_debug = false;
$g_error_reporting = E_ALL & !E_NOTICE;
//$g_error_reporting = E_ALL;

$g_lytebox = "rel='lightbox[set1]'";

$g_content = "doc/hauptseite";
$g_document_to_show = ".pdf$|.PDF$|.php$";
//WICHTIG: nur einen punkt verwenden
$g_info_file = "info.txt";
$g_backup_info_file_after_edit = true;
$g_right_picture_pattern_type = ".JPG$|.jpg$";
$g_right_doc_pattern_type = ".PDF$|.pdf$";
$g_max_right_picture_width = 250;
$g_content_right_with_t4 = "news;5|anlaesse;5|jahresmotto;3";
$g_picture_width = 150;
$g_picture_width_referenceobject = 200;
$g_nr_of_picture_per_line = 4;
$g_picture_to_show = ".jpg$|.JPG$";
//Folgender Wert muss gleich sein, wie table.contentpicture.width im css/etkag.css
$g_table_content_width = 500;
$g_wiki_help = $g_path_cfg . "/wikihelp.txt";

$g_configs_to_modify[] = $g_path_cfg . "/config.inc.php";
$g_default_template = 2; //1-4, 2 means no content on the right hand site


//admin link
$g_admin="<a href='index.php?site=login'>Admin</a>";
if (isset($_SESSION['loggedin'])) {
  $g_admin .= "&nbsp;(" . $_SESSION['username'] . ")";
}

//RSS
//$g_feeds[] = "news";
//$g_feeds[] = "angebote";
//$g_feeds[] = "motto";
?>