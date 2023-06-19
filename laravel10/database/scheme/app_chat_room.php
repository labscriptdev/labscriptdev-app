<?php return [
  'pk' => 'id',
  'fields' => [
    'id' => 'BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT',
    'name' => 'VARCHAR(255) NULL DEFAULT NULL',
    'owner_id' => 'BIGINT(20) UNSIGNED NULL DEFAULT NULL',
    'created_at' => 'TIMESTAMP NULL DEFAULT NULL',
    'updated_at' => 'TIMESTAMP NULL DEFAULT NULL',
  ],
  'fks' => [
    'owner_id' => [
      'to_table' => 'app_user',
      'to_field' => 'id',
      'on_update' => 'NO ACTION',
      'on_delete' => 'NO ACTION',
    ],
  ],
];