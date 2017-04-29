<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Item;

use App\User;

use DB;

class FriendController extends Controller
{
	
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	
	public function index(Request $request)
	{
		
		$items = Item::orderBy('id','DESC')->paginate(5);
		
		return view('ItemCRUD2.index',compact('items'))
		->with('i', ($request->input('page', 1) - 1) * 5);
		
	}
	
	
	
	/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
	
	
	/*  public function create()
    {
        return view('ItemCRUD2.create');
    }*/
	
	
	
	/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
	
	public function autstore($countryid)
	{


		for($i=1;$i<10;$i++){
        $rnd= rand(1, 9000000);   
		$contry = DB::table('countries')->where('id', $countryid)->get();
		
		
		User::create(['name'=>'user_'.$contry[0]->name.'_'.$rnd,'email'=>'user_'.$contry[0]->name.'_'.$rnd.'@gmail.com','password'=>'$2y$10$daMWibOePQug61k6jvCcZOCQr2tPNejKd3u2rWjxtL5w8bRYGLSsu']);
		
		
		$uid=DB::getPdo()->lastInsertId();
		
		
		DB::table('friends')->insert(
		['user_id'=>$uid,'country_id'=>$countryid,'foto'=>'noname.jpg']
		);
		
		$fid=DB::getPdo()->lastInsertId();
		
		
		DB::table('friendslng')->insert(
		['friend_id'=>$fid,'name'=>'friend_'.$contry[0]->name.'_'.$rnd]
		);
		
		//return redirect()->route('crud.itemCRUD2.index')
	//	->with('success','friend created successfully');
        }
	}
	
		public function listfriend($orszagid)
	{
		$friends = DB::table('friends')
            ->join('friendslng', 'friends.id', '=', 'friendslng.friend_id')
            ->select('*')
            ->where('country_id','=',$orszagid)
            ->get();
		return response()->json($friends);
	}
	public function store(Request $request)
	{
		
		
	}
	
	
	
	/**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	
	public function show($id)
	{
		
		$item = Item::find($id);
		
		return view('ItemCRUD2.show',compact('item'));
		
	}
	
	
	
	/**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	
	public function edit($id)
	{
		
		$item = Item::find($id);
		
		return view('ItemCRUD2.edit',compact('item'));
		
	}
	
	
	
	/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	
	public function update(Request $request, $id)
	{
		
		$this->validate($request, [
		'title' => 'required',
		'description' => 'required',
		]);
		
		
		Item::find($id)->update($request->all());
		
		
		return redirect()->route('itemCRUD2.index')
		->with('success','Item updated successfully');
		
	}
	
	
	
	/**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	
	public function destroy($id)
	{
		
		Item::find($id)->delete();
		
		return redirect()->route('itemCRUD2.index')
		->with('success','Item deleted successfully');
		
	}
	
}
