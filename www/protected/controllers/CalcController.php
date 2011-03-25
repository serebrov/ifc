<?php

class CalcController extends Controller
{
	/**
	 * Displays the contact page
	 */
	public function actionBearing()
	{
		$model=new CalcBearingForm;
		if(isset($_POST['CalcBearingForm']))
		{
			$model->attributes=$_POST['CalcBearingForm'];
			if($model->validate())
			{
				$model->calc();
			}
		}

        $format = Yii::app()->request->getParam('format');
        if (isset($format) && $format == 'csv') {
            $this->renderCsv($model->getResult());
        } else {
    		$this->render('bearing',array('model'=>$model));
        }
	}

    public function actionGear()
	{
		$model=new CalcGearForm;
		if(isset($_POST['CalcGearForm']))
		{
			$model->attributes=$_POST['CalcGearForm'];
			if($model->validate())
			{
				$model->calc();
			}
		}

        $format = Yii::app()->request->getParam('format');
        if (isset($format) && $format == 'csv') {
            $this->renderCsv($model->getResult());
        } else {
    		$this->render('gear',array('model'=>$model));
        }
	}

    public function actionSub()
	{
		$model=new CalcSubForm;
		if(isset($_POST['CalcSubForm']))
		{
			$model->attributes=$_POST['CalcSubForm'];
			if($model->validate())
			{
				$model->calc();
			}
		}

        $format = Yii::app()->request->getParam('format');
        if (isset($format) && $format == 'csv') {
            $this->renderCsv($model->getResult());
        } else {
    		$this->render('sub',array('model'=>$model));
        }
	}

    protected function renderCsv($data) {
        Yii::import('ext.CSVExport');
        // create a function in your model like search() that would return
        // a CSqlDataProvider object
        //$provider = new CArrayDataProvider($data);
        
        $csv = new CSVExport($data);

        // some options are
        //$csv->callback = function($row) {// do something with each row};
        // human readable headers
        //$csv->headers = array('first_name'=>'First Name');
        // if you want to use the pagination of the CSqlDataProvider. Defaults to true
        //$csv->exportFull = false;

        // retrieve csv content
        $content = $csv->toCSV();

        // options for file, changing delimeter and enclosure
        $content = $csv->toCSV(null, ";", "'");
        Yii::app()->getRequest()->sendFile('data.csv', $content, "text/csv", false);

        // call exit instead of letting sendFile do it, because if you are using
        // CWebLogRoute, the onEndRequest event will fire and output your log and not csv file :(
        exit();
    }

}