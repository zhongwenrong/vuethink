<?php
// +----------------------------------------------------------------------
// | Description: 组织架构
// +----------------------------------------------------------------------
// | Author: linchuangbin <linchuangbin@honraytech.com>
// +----------------------------------------------------------------------

namespace app\admin\controller;

class Business extends ApiCommon
{
    
    public function index()
    {   
        $businessModel = model('Business');
        $param = $this->param;
        $data = $businessModel->getDataList();
        return resultArray(['data' => $data]);
    }

    public function read()
    {   
        $businessModel = model('Business');
        $param = $this->param;
        $data = $businessModel->getDataById($param['id']);
        if (!$data) {
            return resultArray(['error' => $businessModel->getError()]);
        } 
        return resultArray(['data' => $data]);
    }

    public function save()
    {
        $businessModel = model('Business');
        $param = $this->param;
        $data = $businessModel->createData($param);
        if (!$data) {
            return resultArray(['error' => $businessModel->getError()]);
        } 
        return resultArray(['data' => '添加成功']);
    }

    public function update()
    {
        $businessModel = model('Business');
        $param = $this->param;
        $data = $businessModel->updateDataById($param, $param['id']);
        if (!$data) {
            return resultArray(['error' => $businessModel->getError()]);
        } 
        return resultArray(['data' => '编辑成功']);
    }

    public function delete()
    {
        $businessModel = model('Business');
        $param = $this->param;
        $data = $businessModel->delDataById($param['id'], true);       
        if (!$data) {
            return resultArray(['error' => $businessModel->getError()]);
        } 
        return resultArray(['data' => '删除成功']);    
    }

    public function deletes()
    {
        $businessModel = model('Business');
        $param = $this->param;
        $data = $businessModel->delDatas($param['ids'], true);  
        if (!$data) {
            return resultArray(['error' => $businessModel->getError()]);
        } 
        return resultArray(['data' => '删除成功']); 
    }

    public function enables()
    {
        $businessModel = model('Business');
        $param = $this->param;
        $data = $businessModel->enableDatas($param['ids'], $param['status'], true);  
        if (!$data) {
            return resultArray(['error' => $businessModel->getError()]);
        } 
        return resultArray(['data' => '操作成功']);         
    }
}
 