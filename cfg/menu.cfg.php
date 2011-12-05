<?PHP
/*
 * Diese Bilder werden im Topmenu angezeigt.
 */
//TODO
//$g_topmenu[]="ueberuns";
$g_topmenu[]="kontakt";
$g_topmenu[]="angebote";
$g_topmenu[]="downloads";
$g_topmenu[]="links";
$g_topmenu[]="news";
$g_topmenu[]="anlaesse";

//config to modify
$g_config_files[] = "config.inc.php";
$g_config_files[] = "lang.inc.php";
$g_config_files[] = "layout.inc.php";
$g_config_files[] = "menu.cfg.php";


/*
 * Über uns
 * 
 *                        "Menutext|link|on(1)/off(0)|template(1/2/3/4)
 *                        template 1: bilder auf der seite werden angezeigt
 *                        template 2: bilder auf der seite werden nicht angezeigt
 *                        template 3: dokumente auf der seite werden angezeigt -> TODO
 *                        template 4: motto, news, aktuelles, motto wird auf der seite angezeigt
 */
$menutree_new[110000] 	= "Über uns (VSAS Mitglied)|index.php?site=ueberuns|1|4";
$menutree_new[110100] 	= "Firmengeschichte|index.php?site=geschichte|1|1";
$menutree_new[110200] 	= "Philosophie|index.php?site=philosophie|1|1";
$menutree_new[110300] 	= "Organigramm|index.php?site=organigramm|1|1";
$menutree_new[110400] 	= "Unser Team|index.php?site=unserteam|1|2";
$menutree_new[110500] 	= "Infrastruktur|index.php?site=infrastruktur|1|1";
$menutree_new[110501]   = "Werkstatt|index.php?site=werkstatt|1|2";
$menutree_new[110502]   = "Maschinen|index.php?site=maschinen|1|2";
$menutree_new[110503]   = "Schlosserei|index.php?site=schlosserei|0|2";
$menutree_new[110504]   = "Lager|index.php?site=lager|1|2";
$menutree_new[110505]   = "Büro|index.php?site=buero|1|2";
$menutree_new[110506]   = "Kantine|index.php?site=kantine|1|2";
$menutree_new[110507]   = "Plan Wekrstatt|index.php?site=planwerkstatt|1|2";
$menutree_new[115000] 	= "Geschäftsdokumentation|index.php?site=geschaeftsdokumentation|1|2";
$menutree_new[116000]   = "Kamera|index.php?site=kamera|1|2";
$menutree_new[117000]	= "Stellenangebote|index.php?site=stellenangebote|1|2";
$menutree_new[118000]	= "Galerie|index.php?site=galerie|1|2";
$menutree_new[118010]	= "Fotos|index.php?site=fotogalerie|1|2";
$menutree_new[118020]	= "Filme|index.php?site=filmgalerie|1|2";



/*
 * Elektrotableau
 */
$menutree_new[130000]	= "Produkte|index.php?site=produkte|1|1";
$menutree_new[131000]	= "Schaltanlagen|index.php?site=schaltanlagen|1|2";
$menutree_new[131005]	= "Hausverteilung|index.php?site=hausverteilung|1|2";
$menutree_new[131010]	= "Gebäudeautomation|index.php?site=gebaeudeautomation|1|2";
$menutree_new[131020]	= "EW Trafostation|index.php?site=ew-trafostation|1|2";
$menutree_new[131030]	= "Industrie|index.php?site=industrie|1|2";
$menutree_new[131040]	= "Haustechnik|index.php?site=haustechnik|1|2";
$menutree_new[131050]	= "Sanitäranlagen|index.php?site=sanitaeranlage|1|2";
$menutree_new[131060]	= "Strassentunnel|index.php?site=strassentunnel|1|2";
$menutree_new[131070]	= "Baufirmen|index.php?site=baufirma|1|2";
$menutree_new[131080]	= "Spezialanlagen|index.php?site=spezialanlage|1|2";
$menutree_new[132000]	= "Automation|index.php?site=automation|1auto|1";
$menutree_new[133000]	= "Ergowat Lichtregler|index.php?site=ergowatlichtregler|1|2";
$menutree_new[134000]	= "Elektrobrennstempel|index.php?site=elektrobrennstempel|1|1";


/*
 * Aktuell
 */
$menutree_new[140000]	= "Referenzen|index.php?site=referenzobjekte|1|2";
$menutree_new[140200]	= "News|index.php?site=news|0|2";
$menutree_new[140300]	= "Anlässe|index.php?site=anlaesse|0|2";
$menutree_new[140400]	= "Angebote|index.php?site=angebote|0|2";
$menutree_new[140500]	= "Jahresmotto|index.php?site=jahresmotto|0|2";
$menutree_new[140600]	= "Aktuelle Objekte|index.php?site=aktuelleobjekte|1|2";
$menutree_new[140700]	= "Referenzliste|index.php?site=referenzliste|1|2";
$menutree_new[140800]	= "Statistiken|index.php?site=statistiken|1|2";
$menutree_new[140900]	= "Kamera Werkstatt|index.php?site=kamera|2|2";

/*
 * Qualitätssicherung 
 */
$menutree_new[150000]   = "Qualitätssicherung|index.php?site=qualitaetssicherung|1|1";
$menutree_new[151000]   = "Interne Schulung|index.php?site=schulung|1|2";
$menutree_new[152000]   = "Qualitätskontrolle|index.php?site=qualitaetskontrolle|1|2";
$menutree_new[153000]   = "Fehlermeldungen|index.php?site=fehlermeldungen|1|2";


/*
 * Kontakt
 */
$menutree_new[160000]	= "Kontakt|index.php?site=kontakt|0|2";
$menutree_new[161000]	= "Adressen|index.php?site=adressen|0|2";
$menutree_new[162000]	= "Standort/Anfahrt|index.php?site=anfahrt|0|2";
$menutree_new[163000]	= "Skype Adressen|index.php?site=skype|0|2";
$menutree_new[164000]	= "Vorlage Firmenlogo|index.php?site=logos|0|2";

?>