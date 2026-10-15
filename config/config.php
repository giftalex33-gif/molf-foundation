<?php
return [
  'db_host' => getenv('MOLF_DB_HOST') ?: '127.0.0.1',
  'db_name' => getenv('MOLF_DB_NAME') ?: 'molf_foundation',
  'db_user' => getenv('MOLF_DB_USER') ?: 'root',
  'db_pass' => getenv('MOLF_DB_PASS') ?: '',
];
