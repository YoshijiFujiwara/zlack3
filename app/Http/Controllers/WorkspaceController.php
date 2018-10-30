<?php

namespace App\Http\Controllers;

use App\Http\Resources\WorkspaceResource;
use App\Mail\ConfirmUser;
use App\Model\Workspace;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;

class WorkspaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 見やすく
        return WorkspaceResource::collection(Workspace::latest()->get());
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
        Workspace::create($request->all());
        return response('Created', Response::HTTP_CREATED);
    }

    /**
     * @param Workspace $workspace
     * @return Workspace
     */
    public function show(Workspace $workspace)
    {
        return new WorkspaceResource($workspace);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Workspace $workspace)
    {
        $workspace->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * ログインするワークスペースの情報を取得する
     */
    public function getTargetWorkspace($workspaceId)
    {
        return new WorkspaceResource(Workspace::find($workspaceId));
    }

    /**
     * ワークスペース作成前の確認用メールの送信
     */
    public function sendConfirmEmail () {
        // 6桁の乱数を生成
        $randomNumber = '';
        for ($i = 0; $i < 6; $i++) {
            $randomNumber .= mt_rand(0, 9);
        }

        // todo: 仮のユーザー情報を直す
        Mail::to('yfbiology2@gmail.com')->send(new ConfirmUser($randomNumber));
    }
}
