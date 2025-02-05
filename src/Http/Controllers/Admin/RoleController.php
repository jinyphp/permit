<?php
namespace Jiny\Permit\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

use Jiny\Admin\Http\Controllers\AdminController;
class RoleController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->setVisit($this);

        ##
        $this->actions['table']['name'] = "roles";
        $this->actions['paging'] =  "10";

        $this->actions['view']['layout'] = "jiny-permit::admin.roles.layout";
        $this->actions['view']['table'] = "jiny-permit::admin.roles.table";

        $this->actions['view']['list'] = "jiny-permit::admin.roles.list";
        $this->actions['view']['form'] = "jiny-permit::admin.roles.form";

        // 커스텀 레이아웃
        $this->actions['title'] = "회원권환";
        $this->actions['subtitle'] = "회원의 권한을 관리합니다.";

    }

    // role당 사용자 수 계산출력
    public function hookIndexed($wire, $rows)
    {
        $cnt = [];
        $roles = DB::table('role_user')->get();
        foreach($roles as $role) {
            $role_id = $role->role_id;
            if(isset($cnt[$role_id])) {
                $cnt[$role_id]++;
            } else {
                $cnt[$role_id] = 1;
            }
        }

        foreach($rows as $key => $row)
        {
            $id = $row->id;
            if(isset($cnt[$id])) {
                $rows[$key]->cnt = $cnt[$id];
            } else {
                $rows[$key]->cnt = 0;
            }
        }

        return $rows;
    }

}
