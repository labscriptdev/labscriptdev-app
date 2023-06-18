<?php return [
  'pk' => 'id',
  'fields' => [
    'id' => 'BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT',
    'slug' => 'VARCHAR(255) NULL DEFAULT NULL',
    'name' => 'VARCHAR(255) NULL DEFAULT NULL',
    'permissions' => 'TEXT NULL DEFAULT NULL',
    'created_at' => 'TIMESTAMP NULL DEFAULT NULL',
    'updated_at' => 'TIMESTAMP NULL DEFAULT NULL',
  ],
  'fks' => [],
];