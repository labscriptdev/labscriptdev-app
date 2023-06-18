<?php return [
  'pk' => 'id',
  'fields' => [
    'id' => 'BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT',
    'name' => 'VARCHAR(255) DEFAULT NULL',
    'value' => 'TEXT NULL DEFAULT NULL',
    'public' => 'INT(10) DEFAULT 0',
    'created_at' => 'TIMESTAMP NULL DEFAULT NULL',
    'updated_at' => 'TIMESTAMP NULL DEFAULT NULL',
  ],
  'fks' => [],
];