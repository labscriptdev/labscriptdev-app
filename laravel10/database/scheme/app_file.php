<?php return [
  'pk' => 'id',
  'fields' => [
    'id' => 'BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT',
    'slug' => 'VARCHAR(255) NULL DEFAULT NULL',
    'name' => 'VARCHAR(255) NULL DEFAULT NULL',
    'description' => 'TEXT NULL DEFAULT NULL',
    'size' => 'INT(10) NULL DEFAULT NULL',
    'mime' => 'VARCHAR(100) NULL DEFAULT NULL',
    'ext' => 'VARCHAR(5) NULL DEFAULT NULL',
    'folder' => 'VARCHAR(255) NULL DEFAULT NULL',
    'content' => 'LONGBLOB NULL DEFAULT NULL',
    'created_at' => 'TIMESTAMP NULL DEFAULT NULL',
    'updated_at' => 'TIMESTAMP NULL DEFAULT NULL',
  ],
  'fks' => [],
];