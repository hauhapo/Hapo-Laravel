<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Http\Requests\MemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $members = Member::search($request)
            ->searchRole($request)
            ->paginate(config('app.pagination'));
        return view('members.index', ['members' => $members]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemberRequest $request)
    {
        $data = $request->all();
        $imageMember = uniqid() . '.' . request()->image->getClientOriginalExtension();
        request()->image->storeAs('public/images', $imageMember);
        $data['image'] = $imageMember;
        $data['password'] = Hash::make($data['password']);
        Member::create($data);
        return redirect()->route('members.index')->with('success', __('messages.create'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('members.edit')->with('member', Member::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMemberRequest $request, $id)
    {
        $data = $request->all();
        $image = $request->file('image');

        if (!empty($image)) {
            $imageMember = uniqid() . '.' . request()->image->getClientOriginalExtension();
            request()->image->storeAs('/public/images', $imageMember);
            $data['image'] = $imageMember;
        } else {
            unset($data['image']);
        }
        
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        Member::findOrFail($id)->update($data);
        return redirect()->route('members.index')->with('success', __('messages.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        $member->delete();
        return redirect()->route('members.index')->with('success', __('messages.delete'));
    }
}
