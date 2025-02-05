<?php
namespace Jiny\Permit\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

use Jiny\Admin\Http\Controllers\AdminController;
class AdminUserRole extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->setVisit($this);

        ##
        $this->actions['table']['name'] = "role_user";
        $this->actions['paging'] =  "10";

        $this->actions['view']['layout'] = "jiny-permit::admin.user.layout";
        $this->actions['view']['table'] = "jiny-permit::admin.user.table";
        $this->actions['view']['filter'] = "jiny-permit::admin.user.filter";

        $this->actions['view']['list'] = "jiny-permit::admin.user.list";
        $this->actions['view']['form'] = "jiny-permit::admin.user.form";

        // 커스텀 레이아웃
        $this->actions['title'] = "사용자권환";
        $this->actions['subtitle'] = "사용자의 권한을 관리합니다.";

    }


    public function index(Request $request)
    {
        $id = $request->id;
        if($id) {
            $this->params['id'] = $id;
            $this->actions['table']['where'] = [
                'user_id' => $id
            ];
        }

        return parent::index($request);
    }


    /**
     * 생성폼이 실행될때 호출됩니다.
     */
    public function hookCreating($wire, $value)
    {
        $form = [];
        if(isset($wire->actions['request']['id'])) {
            $id = $wire->actions['request']['id'];
            $user = DB::table('users')->where('id', $id)->first();
            if($user) {
                $form['name'] = $user->name;
                $form['email'] = $user->email;
                $form['user_id'] = $user->id;
            }
        }


        // 생략가능
        return $form; // 설정시 form 입력 초기값으로 설정됩니다.
    }

    /**
     * 신규 데이터 DB 삽입전에 호출됩니다.
     */
    public function hookStoring($wire, $form)
    {
        // if(isset($form['email'])) {
        //     $user = DB::table('users')->where('email', $form['email'])->first();
        //     if($user) {
        //         $form['name'] = $user->name;
        //         $form['user_id'] = $user->id;
        //     }
        // }

        if(!isset($form['role'])) {
            $wire->message = "역할을 선택해주세요.";
            return false;
        }

        return $form; // 사전 처리한 데이터를 반환합니다.
    }

    /**
     * 수정폼이 실행될때 호출됩니다.
     */
    public function hookEditing($wire, $form)
    {
        if(isset($form['email'])) {
            $user = DB::table('users')->where('email', $form['email'])->first();
            if($user) {
                $form['name'] = $user->name;
                $form['user_id'] = $user->id;
            }
        }

        return $form;
    }


}
