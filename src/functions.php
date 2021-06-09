<?php 

function pageCreatedon($page) {
   $pages  = option('hherold.createdon.pages') ?? false;
   $parent = option('hherold.createdon.parent') ?? false;

   if ($pages) {
      if ($parent && $page->isDescendantOf(page($parent))) {
         updatePage($page);
      };
      if ($parent == false) {
         updatePage($page);
      };
   }
};

function fileCreatedon($file) {
   $files  = option('hherold.createdon.files') ?? false;
   $parent = option('hherold.createdon.parent') ?? false;

   if ($files) {
      if ($parent && $file->parents()->has(page($parent))) {
         updatePage($file);
      };
      if ($parent == false) {
         updatePage($file);
      };
   }
};

function updatePage($page) {
   try {
      $newPage = $page->update([
         'createdon' => date('Y-m-d H:i:s')
      ]);
   } catch(Exception $e) {
      echo $e->getMessage();
   }
};