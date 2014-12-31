<?php

namespace FuelSanitize;

class Sanitize
{

	public static function siret($value)
	{
		$value = str_replace(' ', '', $value);

		if (strlen($value) == 14 and is_numeric($value))
		{
			$new_value = array();
			$new_value[] = substr($value, 0, 3);
			$new_value[] = substr($value, 3, 3);
			$new_value[] = substr($value, 6, 3);
			$new_value[] = substr($value, 9, 5);
			return implode(' ', $new_value);
		}
		throw new \FuelException('Can\'t sanitize this.');
	}

	public static function siren($value)
	{
		$value = str_replace(' ', '', $value);

		if (strlen($value) == 9 and is_numeric($value))
		{
			$new_value = array();
			$new_value[] = substr($value, 0, 3);
			$new_value[] = substr($value, 3, 3);
			$new_value[] = substr($value, 6, 3);
			return implode(' ', $new_value);
		}
		throw new \FuelException('Can\'t sanitize this.');
	}

	public static function phone($value)
	{
		$value = str_replace(' ', '', $value);
		$value = str_replace('.', '', $value);
		$value = str_replace('-', '', $value);

		return \Num::format_phone($value, '00 00 00 00 00');
	}

	public static function mb_ucfirst($str, $encoding = "UTF-8", $lower_str_end = false)
	{
		$first_letter = mb_strtoupper(mb_substr($str, 0, 1, $encoding), $encoding);
		$str_end = "";
		if ($lower_str_end)
		{
			$str_end = mb_strtolower(mb_substr($str, 1, mb_strlen($str, $encoding), $encoding), $encoding);
		}
		else
		{
			$str_end = mb_substr($str, 1, mb_strlen($str, $encoding), $encoding);
		}
		$str = $first_letter.$str_end;
		return $str;
	}

}
