<?php

class CalcSubForm extends CFormModel
{
    public $fv;
	public $dtk;
    public $ntk;
	public $beta;
	public $dout;
    public $din;

    private $_result = array();

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			array('fv, dtk, ntk, beta, dout, din', 'required'),
            array('fv, dtk, ntk, beta, dout, din', 'numerical'),
			
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
			'dtk'=>'Диаметр тел качения, мм',
            'ntk'=>'Число тел качения',
            'beta'=>'Угол контакта, °',
            'dout'=>'Внешний диаметр подшипника, мм',
            'din'=>'Внутренний диаметр подшипника, мм',
		);
	}

    public function getResult() {
        return $this->_result;
    }

    public function calc() {
        $this->cleanResult();

        $f = $this->fv / 60;
        $fsep = 0;
        $dsr = ($this->dout + $this->din ) / 2;
        $fnk = 0.5 * $this->ntk * $f * (1 - $this->dtk * cos($this->beta) / $dsr);
        $this->addResult(number_format($fnk,2), 'Повреждения наружного кольца', 'Гц');

        $fvk = 0.5 * $this->ntk * $f * (1 + $this->dtk * cos($this->beta) / $this->dout);
        $this->addResult(number_format($fvk,2), 'Повреждения внутреннего кольца', 'Гц');

        $ftk = ( 0.5 * $dsr * $f / $this->dtk ) * (1 - ( $this->dtk * cos($this->beta) / $dsr) * ( $this->dtk * cos($this->beta) / $dsr) );
        $this->addResult(number_format($ftk, 2), 'Повреждения тел качения', 'Гц');

        $fsep = 0.5 * $f * ( 1 - ( $this->dtk * cos($this->beta) / $dsr) );
        $this->addResult(number_format($fsep, 2), 'Повреждения сепаратора', 'Гц');
        
}

    protected function cleanResult() {
        $this->_result = array();
    }

    protected function addResult($value, $message, $unit) {
        $this->_result[] = array($value, $message, $unit);
    }

}