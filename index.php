<?php

require_once __DIR__ . '/src/functions.php';

Kirby::plugin('hherold/createdon', [
  'options' => [
    'parent' => false,
    'files'  => false,
    'pages'  => false
  ],
  'hooks' => [
    'page.create:after' => function ($page) {
      pageCreatedon($page);
    },
    'page.duplicate:after' => function ($duplicatePage, $originalPage) {
      pageCreatedon($duplicatePage);
    },
    'file.create:after' => function ($file) {
      fileCreatedon($file);
    }
  ]
]);