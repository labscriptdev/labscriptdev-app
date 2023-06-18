<?php return [
  'pk' => 'id',
  'fields' => [
    'id' => 'BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT',
    'name' => 'VARCHAR(255) DEFAULT NULL',
    'user_id' => 'BIGINT(20) UNSIGNED DEFAULT NULL',
    'status' => 'ENUM("unread", "read") DEFAULT "unread"',
    'url' => 'VARCHAR(255) DEFAULT NULL',
    'text' => 'TEXT DEFAULT NULL',
    'created_at' => 'TIMESTAMP NULL DEFAULT NULL',
    'updated_at' => 'TIMESTAMP NULL DEFAULT NULL',
  ],
  'fks' => [
    'user_id' => [
      'to_table' => 'app_user',
      'to_field' => 'id',
      'on_update' => 'NO ACTION',
      'on_delete' => 'NO ACTION',
    ],
  ],
];