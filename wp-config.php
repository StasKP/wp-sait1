<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'wordpress');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'ZK:W@s<V>c-:Q!f12NQTMo&ZU{wHxNWGiR<bxV8UD})[EvI]b#j.r%g9M-6%R]N%');
define('SECURE_AUTH_KEY',  'eP|[pBI6C|*npgSE)+.pKI6[?le9SWp}@{v{PJmQ)/1DK$`nBlv1KlAQ@%9~m>l1');
define('LOGGED_IN_KEY',    'AeC|HFKRdDX5M)p|$X@nXnWqWC6W`NOtn-k~`<cg@Q*eS5H{$K@,MS_O#}=yE N(');
define('NONCE_KEY',        'Rg:y-;8z#g@;aE1{~ANC_v+D&ClI3duqMMvl,sk;yt#D~sRxz!f3e3V)xavJ>@ds');
define('AUTH_SALT',        '@MxN*U0 NG4rC03B*Mg|qjFn|?ux6S=npb6Bdj:[m5e^/]^,G[Q95yzy7r4tF7T%');
define('SECURE_AUTH_SALT', 'QTnY-HJ0TZF|@edleGL8*mU]x1T#D)Pn=f-h (~l8LZ2N}Ng@ z^0c&fXZ.zw{d}');
define('LOGGED_IN_SALT',   'jySl;rxNToO~&s_Smh KnV!I8`,-WVQQQ{k))Wo_c(fMMZCEFmV:m1@K=@C)UB$I');
define('NONCE_SALT',       'O6,7x8~>IZ^W%Td?x8A.Y|88[mazd%b=#P%#W}87QGIsOOB6xCUBw6ZDRVG?k.~T');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
