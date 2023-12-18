CREATE TABLE `channels` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `title` varchar(80) NOT NULL COMMENT '频道名',
    `country` varchar(75) DEFAULT NULL COMMENT '所属国家',
    `province` varchar(75) DEFAULT NULL COMMENT '所属省&州',
    `genre` varchar(80) DEFAULT NULL COMMENT '所属分类',
    `logo` varchar(255) NOT NULL COMMENT '频道logo',
    `type` varchar(20) NOT NULL COMMENT '频道转播方式',
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    `deleted_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='可用频道列表';

CREATE TABLE `channel_data_source` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `channel_id` int(11) NOT NULL COMMENT '频道ID',
    `url` longtext NOT NULL COMMENT '频道直播源地址',
    `extra_data` longtext DEFAULT NULL COMMENT '扩展数据预留',
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    `deleted_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='频道播放源数据表';
