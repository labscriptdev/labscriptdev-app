<?php return [
  'pk' => 'id',
  'fields' => [
    'id' => 'BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT',
    'name' => 'VARCHAR(255) DEFAULT NULL',
    'email_to' => 'VARCHAR(255) DEFAULT NULL',
    'subject' => 'VARCHAR(255) DEFAULT NULL',
    'body' => 'TEXT DEFAULT NULL',
    'send_attempt' => 'INT(10) DEFAULT NULL',
    'send_group' => 'VARCHAR(255) DEFAULT NULL',
    'sent' => 'INT(10) DEFAULT NULL',
    'read' => 'INT(10) DEFAULT NULL',
    'created_at' => 'TIMESTAMP NULL DEFAULT NULL',
    'updated_at' => 'TIMESTAMP NULL DEFAULT NULL',
  ],
  'fks' => [],
];