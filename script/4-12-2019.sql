ALTER TABLE `fp_countries` ADD `status` INT(11) NOT NULL COMMENT '0 menas active, 1 means deactive, 2 means deleted' AFTER `name`;
ALTER TABLE `fp_states` ADD `status` TINYINT(1) NOT NULL DEFAULT '0' COMMENT '0 menas active, 1 means deactive, 2 means deleted' AFTER `country_id`;
ALTER TABLE `fp_cities` ADD `status` TINYINT(1) NOT NULL DEFAULT '0' COMMENT '0 menas active, 1 means deactive, 2 means deleted' AFTER `state_id`;
ALTER TABLE `fp_cities` CHANGE `updated_on` `updated_at` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;
