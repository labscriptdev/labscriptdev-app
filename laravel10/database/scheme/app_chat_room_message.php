<?php return [
  'pk' => 'id',
  'fields' => [
    'id' => 'BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT',
    'name' => 'VARCHAR(255) NULL DEFAULT NULL',
    'status' => 'ENUM("unread", "read") DEFAULT "unread"',
    'from_id' => 'BIGINT(20) UNSIGNED NULL DEFAULT NULL',
    'to_id' => 'BIGINT(20) UNSIGNED NULL DEFAULT NULL',
    'created_at' => 'TIMESTAMP NULL DEFAULT NULL',
    'updated_at' => 'TIMESTAMP NULL DEFAULT NULL',
  ],
  'fks' => [
    'from_id' => [
      'to_table' => 'app_user',
      'to_field' => 'id',
      'on_update' => 'NO ACTION',
      'on_delete' => 'NO ACTION',
    ],
    'to_id' => [
      'to_table' => 'app_user',
      'to_field' => 'id',
      'on_update' => 'NO ACTION',
      'on_delete' => 'NO ACTION',
    ],
  ],
];