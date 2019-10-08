<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Tools;
use App\Tags;
use App\Services\ToolsService;

class ToolsController extends Controller {

    protected $_tools;
    protected $_tags;
    protected $_toolsService;

    public function __construct(Tools $tools, Tags $tags, ToolsService $toolsService)
    {
        $this->_tools = $tools;
        $this->_tags = $tags;
        $this->_toolsService = $toolsService;
    }

    /**
    * Show all data of tools
    *
    * @param Request $id
    * @return respond
    */
    public function index(Request $request) {
        $tag = $request->input('tag');

        $result = $this->_tools::whereHas('relationTags', function($query) use ($tag) {
            if ($tag)
                return $query->where('name', $tag);
        })->get();

        return $this->respond(
            Response::HTTP_OK,
            $result
        );
    }

    /**
    * Store a tool
    *
    * @param Request $request
    * @return respond
    */
    public function store(Request $request)
    {
        $data = $request->all();
        $this->validate($request, $this->_tools::$rules);
        
        $result = $this->_toolsService->save($data);

        return $this->respond(
            Response::HTTP_CREATED,
            $result
        );
    }
    
    /**
    * Delete a tool
    *
    * @param Request $id
    * @return respond
    */
    public function destroy($id)
    {   
        if(is_null($this->_tools::find($id))){
            return $this->respond(Response::HTTP_NOT_FOUND);
        }
        $this->_tools::destroy($id);
        return $this->respond(Response::HTTP_NO_CONTENT);
    }

    /**
    * Format response
    *
    * @param Response $status
    * @param Array $data
    */
    protected function respond($status, $data = [])
    {
        return response()->json($data, $status);
    }

}
