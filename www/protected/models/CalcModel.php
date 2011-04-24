<?php

abstract class CalcModel extends CActiveRecord
{
    private $_result = array();

    abstract public function calc();

    public function getResult() {
        return $this->_result;
    }

    protected function cleanResult() {
        $this->_result = array();
    }

    protected function addResult($message, $value, $unit) {
        $this->_result[] = array($message, $value, $unit);
    }

    public function calcAll() {
        $this->calc();
        foreach($this->tree->descendants()->findAll() as $child) {
           $model = $child->getModel();
           if ($model instanceof CalcModel) {
              $model->calc();
              $this->_result = array_merge($this->_result,
                  array(array('-','-','-')),
                  $model->getResult()
              );
           }
        }
    }

}