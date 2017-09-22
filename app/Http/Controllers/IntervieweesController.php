<?php

namespace App\Http\Controllers;
use App\Libs\BaseClass;
use Illuminate\Http\Request;
use App\Interviewee;
use App\JobPost;


class IntervieweesController extends Controller
{
    public function index()
    {
        if(\Auth::check()){
            $corp_id = \Auth::user()->corp_id;
            $interviewees = Interviewee::where('corp_id', $corp_id)->get();
            //もっとスマートにかけないか　hasmanyとか設定してるんだから
            //ここモデルにかけるのでは？
            return view('interviewees.index', [
                'interviewees' => $interviewees,
            ]);
        }
    
    }
    
    public function create()
    {
        if(\Auth::check()){
            $interviewee = new Interviewee;
            $corp_id = \Auth::user()->corp_id;
            $job_posts = JobPost::where('corp_id', $corp_id)->get();
            return view('interviewees.create', [
                'interviewee' => $interviewee,
                'job_posts' => $job_posts,
                ]);
        }
    }
    
    public function store(Request $request)
    {
        if(\Auth::check()){
        $interviewee = new Interviewee;
        
        $corp_id = \Auth::user()->corp_id;
        
        // password生成
        
        $base = new BaseClass;
        $password = $base->makeRandStr(8);
        
        $interviewee->name = $request->name;
        $interviewee->email = $request->email;
        $interviewee->password = bcrypt($password);
        $interviewee->corp_id = $corp_id;
        $interviewee->name_kana = $request->name_kana;
        $interviewee->job_post_id = $request->job_post_id;
        $interviewee->birthday = $request->birthday;
        $interviewee->sex = $request->sex;
        $interviewee->post_code = $request->post_code;
        $interviewee->address = $request->address;
        $interviewee->github = $request->github;
        $interviewee->portfolio = $request->portfolio;
        $interviewee->motivation = $request->motivation;
        $interviewee->channel = $request->channel;
        $interviewee->save();
        
        return redirect()->action('IntervieweesController@index');
        }
        
    }
    
    public function show($id)
    {
        if(\Auth::check()){
                $interviewee = Interviewee::find($id);
                if(\Auth::user()->corp_id == $interviewee->corp_id){
                    $job_post = JobPost::find($interviewee->job_post_id);
                    return view('interviewees.show', [
                        'interviewee' => $interviewee,
                        'job_post'   => $job_post,
                        ]);
                }
        }
    }
    
    public function edit($id)
    {
        if(\Auth::check()){
        $interviewee = Interviewee::find($id);
        if(\Auth::user()->corp_id == $interviewee->corp_id){
            $job_posts = JobPost::where('corp_id',$interviewee->corp_id)->get();
            return view('interviewees.edit', [
                'interviewee' => $interviewee,
                'job_posts'   => $job_posts,
                ]);
            }
        }
    }
    
    public function update(Request $request, $id)
    {
        if(\Auth::check()){
            $interviewee =  Interviewee::find($id);
            if($interviewee->corp_id == \Auth::user()->corp_id){
                $interviewee->name = $request->name;
                $interviewee->email = $request->email;
                if(isset($request->password)){
                    $interviewee->password = bcrypt($request->password);
                }
                $interviewee->name_kana = $request->name_kana;
                // $interviewee->job_post_id = $interviewee->job_post_id;
                $interviewee->birthday = $request->birthday;
                $interviewee->sex = $request->sex;
                $interviewee->post_code = $request->post_code;
                $interviewee->address = $request->address;
                $interviewee->github = $request->github;
                $interviewee->portfolio = $request->portfolio;
                $interviewee->motivation = $request->motivation;
                $interviewee->channel = $request->channel;
                $interviewee->save();
            
            return redirect()->action('IntervieweesController@index');
            }
        }
    }
    
    public function destroy($id)
    {
        if(\Auth::check()){
        $interviewee = Interviewee::find($id);
            if($interviewee->corp_id == \Auth::user()->corp_id){
                $interviewee->delete();
                return redirect()->action('IntervieweesController@index');
            }
        }
    }
    
}
