<?php

// 视频类别模型
class VideoCatModel extends CommonModel {

    public $_validate = array(
        //0存在就验证1必须验证2值不为空时验证
        array('name', 'require', '名称必须填写', 1),
        array('name', '', '分类名称已经存在', 1, 'unique', 1), //1新增时验证2编辑时验证3全部情况都验证
    );
    public $_auto = array(
        array('updatetime', 'dateFormat', self::MODEL_UPDATE, 'callback'),
        array('type', 'funcflags', self::MODEL_BOTH, 'callback'),
        array('star', 'funcflags', self::MODEL_BOTH, 'callback'),
    );

    protected function funcflags($inVal) {
        if (isset($inVal)) {
            return implode(',', $inVal);
        } else {
            return NULL;
        }
    }

    protected function dateFormat() {
        return date('Y-m-d H:i:s');
    }

    public function getDataJson($curPage, $pageSize, $id = '', $name = '', $ablum = '') {
        $VideoType = D('VideoType');
        $offset = ($curPage - 1) * $pageSize; //分页起始条数
        if ($id == 1) {
            //顶级节点分页需要查询总条数
            if (empty($name)) {
                if (!empty($ablum)) {
                    $where['zhuanjino'] = array('eq', '1');
                } else {
                    $where['pid'] = array('eq', "$id");
                }
            } else {
                if (empty($ablum)) {
                    $where['name'] = array('like', "%$name%");
                } else {
                    $where['name'] = array('like', "%$name%");
                    $where['zhuanjino'] = array('eq', 1);
                    $where['_logic'] = 'and';
                }
            }
            $nums = $this->where($where)->count();
            $rows = $this->where($where)->limit($offset, $pageSize)->select();
            foreach ($rows as $key => $value) {
                $rows[$key]['state'] = $this->hasChild($value['id']) ? 'closed' : 'open';
                $typeArr = explode(',', $value['type']);
                if (is_array($typeArr)) {
                    foreach ($typeArr as $v) {
                        $rows[$key]['ftype'] .= $VideoType->getTypeNameById($v) . '&nbsp';
                    }
                }
            }
            $output = array(
                'total' => $nums,
                'rows' => $rows
            );
        } else {
            $output = $this->where("pid = '$id'")->select();
            foreach ($output as $key => $value) {
                $output[$key]['state'] = $this->hasChild($value['id']) ? 'closed' : 'open';
                $typeArr = explode(',', $value['type']);
                if (is_array($typeArr)) {
                    foreach ($typeArr as $v) {
                        $rows[$key]['ftype'] .= $VideoType->getTypeNameById($v) . '&nbsp';
                    }
                }
            }
        }
        echo json_encode($output);
    }

    /**
     * 检测是否有子元素
     * @param type $id
     * @return boolean
     */
    public function hasChild($id) {
        $child = $this->where("pid = '$id'")->select();
        if ($child) {
            return true;
        } else {
            return false;
        }
    }

}
