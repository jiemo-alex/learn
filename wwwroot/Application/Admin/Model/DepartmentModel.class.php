<?php

namespace Admin\Model;

use Think\Model;

class DepartmentModel extends Model
{
    protected $_validate = array(
        array('departmentId', 'require', '标识不能为空', self::EXISTS_VALIDATE, 'regex', self::MODEL_BOTH),
        array('name', '', 'require', '名称不能为空', self::EXISTS_VALIDATE, 'regex', self::MODEL_BOTH),
        array('parentid', 'require', '父级不能为空', self::MUST_VALIDATE , 'regex', self::MODEL_BOTH),
    );
}
