<?php
Kirby::plugin('hherold/timestamp', [
  'options' => [
    'enabled' => false,
    'parent'  => false
  ],
  'hooks' => [
    'page.create:after' => function ($page) {
      $enabled = option('hherold.timestamp.enabled');
      $parent  = option('hherold.timestamp.parent');

      if ($enabled) {
        if ($parent && $page->isDescendantOf(page($parent))) {
          $newPage = $page->update([
            'timestamp' => date('Y-m-d H:i:s'),
          ]);
        };
        if ($parent == false) {
          $newPage = $page->update([
            'timestamp' => date('Y-m-d H:i:s'),
          ]);
        }
      }
    },
    'page.duplicate:after' => function ($duplicatePage, $originalPage) {
      $enabled = option('hherold.timestamp.enabled');
      $parent  = option('hherold.timestamp.parent');

      if ($enabled) {
        if ($parent && $duplicatePage->isDescendantOf(page($parent))) {
          $newPage = $duplicatePage->update([
            'timestamp' => date('Y-m-d H:i:s'),
          ]);
        };
        if ($parent == false) {
          $newPage = $duplicatePage->update([
            'timestamp' => date('Y-m-d H:i:s'),
          ]);
        }
      }
    }
  ]
]);