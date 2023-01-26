<?php
/**
 * DATABASE
 */
define("CONF_DB_HOST", "localhost");
define("CONF_DB_USER", "root");
define("CONF_DB_PASS", "");
define("CONF_DB_NAME", "kambasport");
 
/**
 * PROJECT URLs
 * 192.168.1.1
 */
define("CONF_URL_BASE", "www.kambaSport.ao");
define("CONF_URL_TEST", "https://www.localhost/kambasport");
define("CONF_URL_ADMIN", "/admin");

/**
 * SITE
 */
define("CONF_SITE_NAME", "Kamba Sport");
define("CONF_SITE_TITLE", "Sistema de Controle");
define("CONF_SITE_DESC",
    " Sistema de Controle de Ginásio");
define("CONF_SITE_LANG", "pt");
define("CONF_SITE_DOMAIN", " ");
define("CONF_NUMBER_PHONE", "924463221");
define("CONF_EMAIL_SITE", "delegação.m.tombwa@hotmail.com");
define("CONF_ADDR_SITE", "CheGuevara, Município do Tômbwa,Namibe–Angola");
/**
 * SOCIAL
 */
define("CONF_SOCIAL_TWITTER_CREATOR", " ");
define("CONF_SOCIAL_TWITTER_PUBLISHER", "@ ");
define("CONF_SOCIAL_FACEBOOK_APP", " ");
define("CONF_SOCIAL_FACEBOOK_PAGE", " ");
define("CONF_SOCIAL_FACEBOOK_AUTHOR", " ");
define("CONF_SOCIAL_GOOGLE_PAGE", " ");
define("CONF_SOCIAL_GOOGLE_AUTHOR", " ");
define("CONF_SOCIAL_INSTAGRAM_PAGE", " ");
define("CONF_SOCIAL_YOUTUBE_PAGE", " ");

/**
 * DATES
 */
define("CONF_DATE_BR", "d/m/Y H:i:s");
define("CONF_DATE_APP", "Y-m-d H:i:s");

/**
 * PASSWORD
 */
define("CONF_PASSWD_MIN_LEN", 8);
define("CONF_PASSWD_MAX_LEN", 40);
define("CONF_PASSWD_ALGO", PASSWORD_DEFAULT);
define("CONF_PASSWD_OPTION", ["cost" => 10]);

/**
 * VIEW
 */
define("CONF_VIEW_PATH", __DIR__ . "/../../shared/views");
define("CONF_VIEW_EXT", "php");
define("CONF_VIEW_THEME", "App");

/**
 * UPLOAD
 */
define("CONF_UPLOAD_DIR", "storage");
define("CONF_UPLOAD_IMAGE_DIR", "images");
define("CONF_UPLOAD_FILE_DIR", "files");
define("CONF_UPLOAD_MEDIA_DIR", "medias");

/**
 * IMAGES
 */
define("CONF_IMAGE_CACHE", CONF_UPLOAD_DIR . "/" . CONF_UPLOAD_IMAGE_DIR . "/cache");
define("CONF_IMAGE_SIZE", 2000);
define("CONF_IMAGE_QUALITY", ["jpg" => 75, "png" => 5]);

/**
 * MAIL
 */
define("CONF_MAIL_HOST", " ");
define("CONF_MAIL_PORT", " ");
define("CONF_MAIL_USER", " ");
define("CONF_MAIL_PASS", " ");
define("CONF_MAIL_SENDER", ["name" => " ", "address" => " "]);
define("CONF_MAIL_SUPPORT", "");
define("CONF_MAIL_OPTION_LANG", "pt");
define("CONF_MAIL_OPTION_HTML", true);
define("CONF_MAIL_OPTION_AUTH", true);
define("CONF_MAIL_OPTION_SECURE", "tls");
define("CONF_MAIL_OPTION_CHARSET", "utf-8");