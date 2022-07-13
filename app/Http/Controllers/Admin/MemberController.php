<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\memberRequest;
use App\Models\member;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MemberController extends Controller
{

    public function index()
    {
        if (request()->ajax()) {
            $query = Member::query();

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a class="btn btn-primary"
               
                            href="' . route('member.edit', $item->id) . '">
                            Edit
                        </a>
                        <form action="' . route('member.destroy', $item->id) . '" method="POST">
                        <button class="btn btn-danger" >
                            Hapus
                        </button>
                            ' . method_field('delete') . csrf_field() . '
                        </form>';
                })
                ->rawColumns(['action'])
                ->make();
        }

        return view('admin.member.index');
    }

    public function create()
    {
        return view('admin.member.create', [
            'label' => 'Create',
            'member' => new member()
        ]);
    }

    public function store(memberRequest $request)
    {
        $profile_image      = $request->file('profile_image');
        $fileName   = time() . '_' . $profile_image->getClientOriginalName();
        $profile_image      = $profile_image->storeAs('images/member', $fileName, 'public');

        member::create([

            'name'   => $request->name,
            'email'   => $request->email,
            'gender'   => $request->gender,
            'password'   => bcrypt($request->password),
            'pin'   => bcrypt($request->pin),
            'no_anggota'   => $request->no_anggota,
            'phone'   => $request->phone,
            'profile_image'     => $profile_image,
            'registration_date' => Carbon::now()
        ]);

        return to_route('member.index')->with('success', 'member created successfully');
    }

    public function edit(member $member)
    {
        return view('admin.member.edit', [
            'label' => 'Update',
            'member'  => $member
        ]);
    }

    public function update(memberRequest $request, member $member)
    {
        $profile_image = $request->file('profile_image');
        if ($profile_image) {
            \Illuminate\Support\Facades\Storage::delete('public/' . $member->profile_image);
            $fileName = time() . '_' . $profile_image->getClientOriginalName();
            $profile_image = $profile_image->storeAs('images/member', $fileName, 'public');
        } else {
            $profile_image = $member->profile_image;
        }

        $member->update([
            'name'   => $request->name,
            'email'   => $request->email,
            'gender'   => $request->gender,
            'password'   => bcrypt($request->password),
            'pin'   => bcrypt($request->pin),
            'no_anggota'   => $request->no_anggota,
            'phone'   => $request->phone,
            'profile_image'     => $profile_image,
        ]);

        return to_route('member.index')->with('success', 'member Post updated successfully');
    }

    public function destroy(member $member)
    {

        $member->delete();

        return to_route('member.index')->with('success', 'member Post deleted successfully');
    }
}
