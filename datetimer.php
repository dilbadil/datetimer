<?php

/**
 * 
 * Manipulate php date
 * 
 */
class DateTimer
{
	/**
	 * @var date $date
	 */
	private $date;

	/**
	 * @var $format
	 */
	private $format;

	/**
	 * @param $strTime
	 */
	public function __construct($strTime = '')
	{

		$this->format = 'Y-m-d H:i:s';

		if (empty($strTime)) {
			$strTime = date($this->format);
		}

		$this->date = date($this->format, strtotime($strTime));
		
		return $this;
	
	}

	/**
	 * Set the date
	 * 
	 * @param date
	 * @return mixed
	 */
	public function setDate ($date)
	{

		$this->date = date($this->format, strtotime($date));
		
		return $this;
	
	}

	/**
	 * Get the date
	 * 
	 * @return date
	 */
	public function getDate ()
	{

		return date($this->format, strtotime($this->date));

	}

	/**
	 * Set format of the date
	 * 
	 * @param date format
	 * @return mixed
	 */
	public function setFormat ($format)
	{

		$this->format = $format;

		return $this;

	}

	/**
	 * Get format
	 * 
	 * @return format
	 */
	public function getFormat ()
	{

		return $this->format;
	}

	/**
	 * Add n years of the date
	 * 
	 * @param n
	 * @param operation
	 * @return mixed
	 */
	public function addYear ($n, $operation = '+')
	{

		$date = $this->date;
		$strDate = strtotime($date);
		$format = $this->format;
		$new = date($format, strtotime("{$operation}{$n} Years", $strDate));
		$this->date = $new;

		return $this;
	
	}

	/**
	 * Add n months of the date
	 * 
	 * @param n
	 * @param operation
	 * @return mixed
	 */	
	public function addMonth ($n, $operation = '+')
	{

		$date = $this->date;
		$strDate = strtotime($date);
		$format = $this->format;
		$new = date($format, strtotime("{$operation}{$n} Months", $strDate));
		$this->date = $new;

		return $this;
	
	}

	/**
	 * Add n weeks of the date
	 * 
	 * @param n
	 * @param operation
	 * @return mixed
	 */	
	public function addWeek ($n, $operation = '+')
	{

		$date = $this->date;
		$strDate = strtotime($date);
		$format = $this->format;
		$new = date($format, strtotime("{$operation}{$n} Week", $strDate));
		$this->date = $new;

		return $this;
	
	}

	/**
	 * Add n days of the date
	 * 
	 * @param n
	 * @param operation
	 * @return mixed
	 */	
	public function addDay ($n, $operation = '+')
	{

		$date = $this->date;
		$strDate = strtotime($date);
		$format = $this->format;
		$new = date($format, strtotime("{$operation}{$n} Days", $strDate));
		$this->date = $new;

		return $this;
	
	}

	/**
	 * Add n hours of the date
	 * 
	 * @param n
	 * @param operation
	 * @return mixed
	 */	
	public function addHour ($n, $operation = '+')
	{

		$date = $this->date;
		$strDate = strtotime($date);
		$format = $this->format;
		$new = date($format, strtotime("{$operation}{$n} Hours", $strDate));
		$this->date = $new;

		return $this;

	}

	/**
	 * Add n minutes of the date
	 * 
	 * @param n
	 * @param operation
	 * @return mixed
	 */	
	public function addMinute ($n, $operation = '+')
	{

		$date = $this->date;
		$strDate = strtotime($date);
		$format = $this->format;
		$new = date($format, strtotime("{$operation}{$n} Minutes", $strDate));
		$this->date = $new;

		return $this;
	
	}

	/**
	 * Add n seconds of the date
	 * 
	 * @param n
	 * @param operation
	 * @return mixed
	 */	
	public function addSecond ($n, $operation = '+')
	{

		$date = $this->date;
		$strDate = strtotime($date);
		$format = $this->format;
		$new = date($format, strtotime("{$operation}{$n} Seconds", $strDate));
		$this->date = $new;

		return $this;
	}

	/**
	 * Add n of times of the date, like addHour, addYear, addMonth, etc
	 * 
	 * @param n
	 * @param operation
	 * @return mixed
	 */	
	public function addTimes ($n, $operation = '+')
	{

		$exp = explode(' ', $n);	//Y4 M3 D1 H3 I6 S30
		$date = new DateTimer($this->date);
		$date->setFormat($this->format)->getDate();
		
		foreach ($exp as $k => $v) {

			$type = strtoupper(substr($v, 0, 1));
			$typeValue = substr($v, 1);

			switch ($type) {
				case 'Y':
					$this->date = $date->addYear($typeValue, $operation)->getDate();
				break;
				
				case 'M':
					$this->date = $date->addMonth($typeValue, $operation)->getDate();
				break;
				
				case 'W':
					$this->date = $date->addWeek($typeValue, $operation)->getDate();
				break;
				
				case 'D':
					$this->date = $date->addDay($typeValue, $operation)->getDate();
				break;
				
				case 'H':
					$this->date = $date->addHour($typeValue, $operation)->getDate();
				break;

				case 'I':
					$this->date = $date->addMinute($typeValue, $operation)->getDate();
				break;
				
				case 'S':
					$this->date = $date->addSecond($typeValue, $operation)->getDate();
				break;
			}
		}

		return $this;

	}

	/**
	 * convert the date to string
	 * 
	 * @return strtotime date
	 */
	public function toNumber ()
	{

		return strtotime($this->date);

	}

	/**
	 * Compare the date with other date
	 * 
	 * @param date $with
	 * @return int
	 */
	public function compareTo ($with)
	{

		$new = new DateTimer($with);
		$newNum = $new->toNumber();
		$curNum = $this->toNumber();
		
		if ($curNum > $newNum) {
			$cek = 1;
		} else if ($curNum < $newNum) {
			$cek = -1;
		} else if ($curNum == $newNum) {
			$cek = 0;
		} else {
	

			$cek = false;
		}

		return $cek;
	}

	/**
	 * Generate range the date that compare with today 
	 * 
	 * @return int
	 */
	public function rangeToday ()
	{

		$now = new DateTimer(date('Y-m-d H:i:s'));
		$nowNum = $now->toNumber();
		$thisNum = $this->toNumber();
		$selisihNum = $thisNum - $nowNum;
		$secInDay = 3600 * 24;
		$day = $selisihNum / $secInDay;
		
		return round($day);
	
	}

	/**
	 * Check range of the date with other date
	 * 
	 * @param date $with
	 * @param $set
	 * @return int 
	 */
	public function range ($with, $set = 'D')
	{

		$new = new DateTimer($with);
		$newNum = $new->toNumber();
		$thisNum = $this->toNumber();
		$selisihNum = $thisNum - $newNum;
		$secInDay = 3600 * 24;
		$secInHour = 3600;
		$secInMinute = 3600;
		$set = strtoupper($set);
		
		switch ($set) {
			case 'M':
				$sec = $secInMinute;
				break;

			case 'D':
				$sec = $secInDay;
				break;
			
			case 'H':
				$sec = $secInHour;
				break;

			case 'Y':
				$sec = $secInDay * 365;
				break;
		}
		
		$result = $selisihNum / $sec;
		$result = abs($result);
		
		return round($result);

	}

	/**
	 * Check old of the date
	 * 
	 * @return int
	 */
	public function isOld ($nOld, $at = '')
	{

		$personDate = new DateTimer($this->getDate());
		$personDate->setFormat('Y-m-d');
		
		if (empty($at)) {
			$at = date('Y-m-d');
		}

		$atObj = new DateTimer($at);
		$atObj->setFormat('Y-m-d')->addYear($nOld, '-');
		$cek = $atObj->compareTo($personDate->getDate());
		
		//0 = equal, 1 = true, -1 = false
		return $cek;

	}

	/**
	 * Checking the date
	 * 
	 * @return boolean
	 */
	public function ageIs ()
	{

		//date in mm/dd/yyyy format; or it can be in other formats as well
		$theDate = new DateTimer($this->getDate());
		$theDate->setFormat('m/d/Y');
		
		//explode the date to get month, day and year
		$birthDate = explode("/", $theDate->getDate());
		
		//get age from date or birthdate
		$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y") - $birthDate[2]) - 1) : (date("Y") - $birthDate[2]));
		
		return $age;
	}
}
