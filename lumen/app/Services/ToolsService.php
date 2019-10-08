<?php
namespace App\Services;

use App\Tools;
use App\Tags;

class ToolsService {

  /**
  * Create a new Tool with tags
  *
  * @param Array $data
  * @return Tools
  */
  public function save(Array $data): Tools {
    \DB::beginTransaction();

    $tools = new \App\Tools;
    $tags = new \App\Tags;
    $dataTags = $data['tags'] ?? false;

    try {
      $tool = $tools::create($data);

      if($dataTags) {
          foreach ($dataTags as $key => $value) {
              $tag = $tags::where('name', $value)->first();
              
              if(!$tag) {
                  $tag = $tags::create(['name' => $value]);
              }

              $tool->relationTags()->attach($tag);
          }
      }

      \DB::commit();
      
      return $tool;
    } catch (\Exception $e) {
        \DB::rollback();
        throw $e;
    }
  }

}