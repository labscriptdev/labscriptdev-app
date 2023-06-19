<?php return [
  'pk' => 'id',
  'fields' => [
    'id' => 'BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT',
    'name' => 'VARCHAR(255) NULL DEFAULT NULL',
    'email' => 'VARCHAR(255) NULL DEFAULT NULL',
    'email_verified_at' => 'TIMESTAMP NULL DEFAULT NULL',
    'password' => 'VARCHAR(255) NULL DEFAULT NULL',
    'group_id' => 'BIGINT(20) UNSIGNED NULL DEFAULT NULL',
    'photo_id' => 'BIGINT(20) UNSIGNED NULL DEFAULT NULL',
    'remember_token' => 'VARCHAR(100) NULL DEFAULT NULL',
    'created_at' => 'TIMESTAMP NULL DEFAULT NULL',
    'updated_at' => 'TIMESTAMP NULL DEFAULT NULL',
  ],
  'fks' => [
    'group_id' => [
      'to_table' => 'app_user_group',
      'to_field' => 'id',
      'on_update' => 'NO ACTION',
      'on_delete' => 'NO ACTION',
    ],
  ],
];