CREATE TABLE tx_teaser2_domain_model_item
(
    title       varchar(255) NOT NULL DEFAULT '',
    subtitle    varchar(255) NOT NULL DEFAULT '',
    link        varchar(255) NOT NULL DEFAULT '',
    media       int(11) unsigned NOT NULL DEFAULT '0',
    content_uid int(11) unsigned DEFAULT '0' NOT NULL,
    brightness  tinyint(3) unsigned DEFAULT '100' NOT NULL,
    layout      varchar(255) NOT NULL DEFAULT ''
);

CREATE TABLE tt_content
(
    tx_teaser2_items  int(11) DEFAULT '0' NOT NULL,
    tx_teaser2_layout varchar(40) DEFAULT NULL
);
