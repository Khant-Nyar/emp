<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Relationship;
class RelationshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $relationship = Relationship::all();
        return view('Admin.contact..relationship.relationship',compact('relationship'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
                'relationship_name' => 'required',
            ]);
        $previous_relationships = Relationship::all();
        foreach($previous_relationships as $previous_relationship){
            if($request->relationship_name==$previous_relationship['relationship_name']){
                return redirect('/relationship')->with('error_message','Relationship Name Already Exist');
            }
        } 
        $relationship = new Relationship();
        $relationship->relationship_name = $request->relationship_name;
        $relationship->save();
        return redirect('/relationship')->with('success_message','Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit_relationship = Relationship::find($id);
        return view('Admin.contact.relationship.edit_relationship',compact('edit_relationship'));
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
                'relationship_name' => 'required',
            ]);
        Relationship::find($id)->update($request->all());
        return redirect('/relationship')->with('success_message','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Relationship::find($id)->delete();
        return redirect('/relationship');
    }
}
