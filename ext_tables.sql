CREATE TABLE tx_teaser2_domain_model_item
(
    content_uid int(11) unsigned DEFAULT '0' NOT NULL,
);

CREATE TABLE tt_content
(
    tx_teaser2_items  int(11) DEFAULT '0' NOT NULL,
    tx_teaser2_layout varchar(40) DEFAULT NULL
);
