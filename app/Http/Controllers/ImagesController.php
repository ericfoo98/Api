<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Images;
use Response;
use DB;

class ImagesController extends Controller
{
    public function all(Request $request){

        $data=Images::all();

        return Response::json($data, 200, ['Content-type'=> 'application/json; charset=utf-8'],  JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    }
 
    public function id($id){
 
        $data=Images::find($id);
        $data->increment('requestcount');
 
        return Response::json($data, 200, ['Content-type'=> 'application/json; charset=utf-8'],  JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
 
    }
 
    public function page($page){

        $data=Images::where('page',$page)->get();
 
        return Response::json($data, 200, ['Content-type'=> 'application/json; charset=utf-8'],  JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
 
    }
 
    public function popular(){
        $data = Images::find(DB::table('image')->max('requestcount'))->first();
 
 
        return Response::json($data, 200, ['Content-type'=> 'application/json; charset=utf-8'],  JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
 
    }
 
    public function create(){
 
        return view('meme.create');
 
    }
 
    public function save(Request $request){
        $max = Images::max('page');
        $data = Images::where('page',$max)->get();
 
        if(count($data) == 9){
            $max++;
            $data = new Images;
            $data->name = $request->input('name');
            $data->url = $request->input('picture');
            $data->page =$max;
            $data->save();
            
        }else{
            $data = new Images;
            $data->name = $request->input('name');
            $data->url = $request->input('picture');
            $data->page = $max;
            $data->save();
        }
        return redirect('/api/meme/create');
    }
}


//   $countpage=837;
//   for($loop=1;$loop<=$countpage;$loop++){
//
//     $page="https://interview.agsmartit.com/index.php?page=$loop";
//     $context=stream_context_create(array('https' => array('timeout' => 10000000000),
//
//     ini_set("max_execution_time", 0);
//     $html = file_get_contents($page,false,$context);
//
//     $doc = new \DOMDocument();
//     @$doc->loadHTML($html);
//     $xpath = new \DomXPath($doc);
//     //id
//     //name
//     $nodeLists = $xpath->query("//h6[@class='text-center']");
//     //image path
//     $tags = $doc->getElementsByTagName('img');
//
//
//     foreach($nodeLists as $nodeList){
//         $name[] =   $nodeList->nodeValue;
//         $pages[] =  $loop;
//
//     }
//
//
//     foreach ($tags as $tag) {
//
//         $url[] =  $tag->getAttribute('src') ;
//
//     }
//
//     $data = new image();
//
//     $data->name = $name[$loop];
//     $data->url = $url[$loop];
//     $data->page = $pages[$loop];
//     $data->save();
// }
