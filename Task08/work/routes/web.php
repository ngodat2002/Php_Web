<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\HomeController;
use App\Models\Post;
use App\Models\Task;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route::get("home",[Task::class,'shows']);
////
//Route::get('/', function () {
//    return view('welcome');
//});
//Route::get('/', function () {
//    return view('task');
//});
//Route::get('about',function (){
//    return 'About Content';
//});
//Route::get('about/directions',function (){
//    return 'Direction go here';
//});
//Route::any('submit-form',function (){
//    return 'Process Form ';
//});
//Route::get('about/{theSubject}',function ($theSubject){
//   return $theSubject.' content goes here';
//});
//Route::get('about/classes/{theArt}/{thePrice}',function ($theArt,$thePrice){
//    return "The product : $theArt and $thePrice";
//});
//Route::get('where',function (){
//   return Redirect::to('about/directions');
//});
//Route::get("profile/{name}",[ProfileController::class,'showProfile']);
//
//Route::get('/insert',function (){
//   DB::insert('insert into posts (title,body,is_admin) values (?,?,?)',['PHP with Laravel','Laravel is the best!',1]);
//return 'DONE';
//});
//Route::get('/read',function (){
//    $result=DB::select('select * from posts where id = ?',[1]);
////    return $result;
//    foreach ($result as $posts){
//        return $posts->title;
//    }
//});
//Route::get('/update',function (){
//   $update = DB::update('update posts set title = "New Title HIHI" where id>?',[1]);
//   return $update;
//});
//
//Route::get('/delete',function (){
//   $deleted = DB::delete('delete from posts where id=?',[1]);
//   return $deleted;
//});
//Route::get('/readAll',function (){
//   $posts = Post::all();
//   foreach ($posts as $p){
//       echo $p->title;
//   }
//});
//Route::get('findId',function (){
//   $posts = Post::where('id','>=',1)
//       ->where('title','Php Laravel')
//       ->where('body','best','%the%')
//   ->orderBy('id','desc')
//   ->take(10)
//   ->get();
//   foreach ($posts as $p){
//       echo $p->title . " " .$p->body;
//       echo "<br>";
//   }
//});
//
//Route::get('insertORM',function (){
//    $p = new Post;
//    $p->title='InsertORM';
//    $p -> body='Insert Done Done ORM';
//    $p -> is_admin=1;
//    $p -> save();
//});
//Route::get('updateORM',function (){
//    $p = Post::where('id',2)->first();
//    $p->title='Update ORM';
//    $p -> body='Update Done Done ORM';
//
//    $p ->save();
//});
//Route::get('deleteORM',function (){
//   Post::where('id','>=',14)
//       ->delete();
//});
//Route::get('destroy',function (){
//    Post::destroy([7,5]);
//});
//
///*/*/
Route::post('/task',function (Request $request){
    $validate = Validator::make($request->all(),[
        'name'=>'required|max:255',
    ]);
    if ($validate->fails()){
        return redirect('/')
            ->withInput()
            ->withErrors($validate);
    }
    $task = new Task;
    $task -> name=$request->name;
    $task->save();
    return redirect('/');
});
Route::delete('/task/{task}',function($id){
   Task::findOrFail($id) -> delete();
   return redirect('/');
});

Route::get('/',function (){
    $task = Task::orderBy('created_at','desc')->get();
    return view('task',[
        'task'=>$task
    ]);
});
