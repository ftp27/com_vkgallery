DROP TABLE IF EXISTS `#__vkg_menutree`;

CREATE TABLE `#__vkg_menu` (
 `id`       int(11) NOT NULL AUTO_INCREMENT,
 `title`     varchar(256) NOT NULL,
 `type`     ENUM('elem', 'gallery') NOT NULL DEFAULT 'elem',
 `album`  int(11),
 `parent`   int(11) NOT NULL DEFAULT 0,
 `position` int(11) NOT NULL,
 `visible`  BOOLEAN DEFAULT TRUE,
 PRIMARY KEY(`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `#__vkg_album`;

CREATE TABLE `#__vkg_album` (
 `id`          int(11) NOT NULL,
 `thumb_id`    int(11) NOT NULL,
 `title`       varchar(256) NOT NULL,
 `description` TEXT NOT NULL,
 `created`     int(11) NOT NULL,
 `updated`     int(11) NOT NULL,
 `size`        int(11) NOT NULL,
 `thumb_src`   TEXT NOT NULL,
 `position`    int(11) NOT NULL,
  `visible`  BOOLEAN DEFAULT TRUE,
 PRIMARY KEY(`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `#__vkg_image`;

CREATE TABLE `#__vkg_image` (
 `id`         int(11) NOT NULL,
 `album_id`   int(11) NOT NULL,
 `photo_75`   TEXT NOT NULL,
 `photo_130`  TEXT,
 `photo_604`  TEXT,
 `photo_807`  TEXT,
 `photo_1280` TEXT,
 `photo_2560` TEXT,
 `width`      int(11) NOT NULL,
 `height`     int(11) NOT NULL,
 `text`       TEXT,
 `date`       int(11) NOT NULL,
 `likes`      int(11),
 `comments`   int(11),
 `position`   int(11),
 `visible`    BOOLEAN DEFAULT TRUE, 
 PRIMARY KEY(`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
