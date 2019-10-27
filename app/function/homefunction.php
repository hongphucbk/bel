<?php

// Mở composer.json
// Thêm vào trong "autoload" chuỗi sau
// "files": [
//         "app/function/function.php"
// ]

// Chạy cmd : composer dumpautoload

use Carbon\Carbon;
use App\Model\Course\Info;
use App\Model\Course\Lesson;


	function changeTitle($str,$strSymbol='-',$case=MB_CASE_LOWER){// MB_CASE_UPPER / MB_CASE_TITLE / MB_CASE_LOWER
		$str=trim($str);
		if ($str=="") return "";
		$str =str_replace('"','',$str);
		$str =str_replace("'",'',$str);
		$str = stripUnicode($str);
		$str = mb_convert_case($str,$case,'utf-8');
		$str = preg_replace('/[\W|_]+/',$strSymbol,$str);
		return $str;
	}

	function get_Total_Lesson($id)
	{
		$lessons = Lesson::where('course_info_id', $id)->get();
		return count($lessons);
	}

	function getFilterName($strPath)
	{
		$arrSpec = array("!","@","#","$","&","(",")","%","+","^");
		foreach ($arrSpec as $key => $val) {
			$strPath = str_replace($val, '_', $strPath);
		}
		return $strPath;
	}



	


?>