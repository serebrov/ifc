<?php
/**
 * EClientSctipr class file
 * @package components
 * @author seb
 */

/**
 * EClientScript allows to render registered scripts in taconite format
 * @package components
 * @author seb
 */
class EClientScript extends CClientScript {

	public function renderScriptsTaconite() {
		
		$scripts=isset($this->scripts[self::POS_END]) ? $this->scripts[self::POS_END] : array();
		if(isset($this->scripts[self::POS_READY]))
		{
			$scripts[]=implode("\n",$this->scripts[self::POS_READY]);
		}
		if(isset($this->scripts[self::POS_LOAD]))
		{
			$scripts[]=implode("\n",$this->scripts[self::POS_LOAD]);
		}
		if(empty($scripts)) {
			return '';
		}
		return 
			"<taconite>\n". 
				"<eval>\n".
					CHtml::script(implode("\n",$scripts))."\n";
				"</eval>\n".
			"</taconite>\n";
	}
	
}