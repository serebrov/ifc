<?php

class CalcGearForm extends CFormModel
{
    public $fv;
	public $nz;
    
    private $_result = array();

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			array('fv, nz', 'required'),
            array('fv, nz', 'numerical'),
			
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
            'fv'=>'Частота вращения, об/мин',
			'nz'=>'Количество зубьев, шт',
);
	}

    public function getResult() {
        return $this->_result;
    }

    public function calc() {
        $this->cleanResult();

        $f = $this->fv / 60;
        $fz = $f * $this->nz;
        $this->addResult(number_format($fz,2), 'Повреждения зубчатой передачи', 'Гц');
        //$fnk = 0.5 * $this->ntk * $f * (1 - $this->din * cos($this->beta) / $this->dout);
        //$this->addResult(number_format($fnk,2), 'Повреждения наружного кольца', 'Гц');

        //$fvk = 0.5 * $this->ntk * $f * (1 - $this->din * cos($this->beta) / $this->dout);
        //$this->addResult(number_format($fvk,2), 'Повреждения внутреннего кольца', 'Гц');

        //$ftk = 0.5 * $this->ntk * $f * (1 - $this->din * cos($this->beta) / $this->dout);
        //$this->addResult(number_format($fvk, 2), 'Повреждения тел качения', 'Гц');

        //$ftk = 0.5 * $this->ntk * $f * (1 - $this->din * cos($this->beta) / $this->dout);
        //$this->addResult(number_format($fvk, 2), 'Повреждения тел качения3', 'Гц');

        //$ftk = 0.5 * $this->ntk * $f * (1 - $this->din * cos($this->beta) / $this->dout);
        //$this->addResult(number_format($fvk, 2), 'Повреждения тел качения4', 'Гц');
    }

    protected function cleanResult() {
        $this->_result = array();
    }

    protected function addResult($value, $message, $unit) {
        $this->_result[] = array($value, $message, $unit);
    }

}