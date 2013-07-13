CREATE TABLE `stripe_charge` (
  `id` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `object_id` varchar(255) NOT NULL DEFAULT '',
  `object_created` int(11) NOT NULL,
  `livemode` tinyint(1) NOT NULL DEFAULT '0',
  `amount` int(11) NOT NULL DEFAULT '0',
  `captured` tinyint(1) NOT NULL DEFAULT '1',
  `currency` varchar(255) NOT NULL DEFAULT 'usd',
  `refunded` tinyint(1) NOT NULL DEFAULT '0',
  `fee` int(11) NOT NULL DEFAULT '0',
  `card_id` int(11) NOT NULL,
  `card_fingerprint` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8

CREATE TABLE `stripe_customer` (
  `id` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `object_id` varchar(255) NOT NULL DEFAULT '',
  `object_created` int(11) NOT NULL,
  `livemode` tinyint(1) NOT NULL DEFAULT '0',
  `amount` int(11) NOT NULL DEFAULT '0',
  `captured` tinyint(1) NOT NULL DEFAULT '1',
  `currency` varchar(255) NOT NULL DEFAULT 'usd',
  `refunded` tinyint(1) NOT NULL DEFAULT '0',
  `fee` int(11) NOT NULL DEFAULT '0',
  `card_id` int(11) NOT NULL,
  `card_fingerprint` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8

CREATE TABLE `stripe_card` (
  `id` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `object_id` varchar(255) NOT NULL DEFAULT '',
  `object_created` int(11) NOT NULL,
  `last4` char(4) NOT NULL DEFAULT '',
  `type` varchar(20) NOT NULL DEFAULT '',
  `exp_month` int(2) NOT NULL DEFAULT '0',
  `exp_year` int(4) NOT NULL DEFAULT '0',
  `captured` tinyint(1) NOT NULL DEFAULT '1',
  `fingerprint` varchar(255) NOT NULL DEFAULT '',
  `country` varchar(255) NOT NULL DEFAULT 'usd',
  `name` varchar(255) NOT NULL DEFAULT 'usd',
  `address_line1` varchar(255) DEFAULT NULL,
  `address_line2` varchar(255) DEFAULT NULL,
  `address_city` varchar(255) DEFAULT NULL,
  `address_state` varchar(255) DEFAULT NULL,
  `address_zip` varchar(255) DEFAULT NULL,
  `address_country` varchar(255) DEFAULT NULL,
  `cvc_check` varchar(255) DEFAULT NULL,
  `address_line1_check` varchar(255) DEFAULT NULL,
  `address_zip_check` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8
