<?php return [
  'pk' => 'id',
  'fields' => [
    'id' => 'BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT',
    'slug' => 'VARCHAR(255) DEFAULT NULL',
    'name' => 'VARCHAR(255) DEFAULT NULL',
    'subject' => 'VARCHAR(255) DEFAULT NULL',
    'body' => 'TEXT DEFAULT NULL',
    'created_at' => 'TIMESTAMP NULL DEFAULT NULL',
    'updated_at' => 'TIMESTAMP NULL DEFAULT NULL',
  ],
  'fks' => [],
];