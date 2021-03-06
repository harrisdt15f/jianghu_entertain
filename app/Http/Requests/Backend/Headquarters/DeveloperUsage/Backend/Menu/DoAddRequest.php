<?php

namespace App\Http\Requests\Backend\Headquarters\DeveloperUsage\Backend\Menu;

use App\Http\Requests\BaseFormRequest;
use App\Models\DeveloperUsage\Menu\BackendSystemMenu;

/**
 *  Class for menu do add request.
 */
class DoAddRequest extends BaseFormRequest
{
  
    /**
     * @var array 需要依赖模型中的字段备注信息
     */
    protected $dependentModels = [BackendSystemMenu::class];
    
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return boolean
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return mixed[]
     */
    public function rules(): array
    {
        return [
                'label'   => 'required|unique:backend_system_menus|regex:/[\x{4e00}-\x{9fa5}]+/u', //标题
                'en_name' => [
                              'required',
                              'unique:backend_system_menus',
                              'regex:/^[A-Za-z]{3,30}+$/',
                             ], //3-30位大小写
                'display' => 'required|numeric|in:0,1', //是否显示  0否 1是
                'route'   => 'required|regex:/^(?!.*\/$)(?!.*?\/\/)[a-z0-9\/-]+$/', //路由(小写+数字+“/”)
                  //图标(小写+数字+“-”)
                'icon'    => 'regex:/^(?!\-)(?!.*\-$)(?!.*?\-\-)(?!\ )(?!.*\ $)(?!.*?\ \ )[a-z0-9 -]+$/',
                'pid'     => 'required|integer',//父级ID
                'level'   => 'required|integer',//层级
               ];
    }
}
