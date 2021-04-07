<?php

namespace App\Helpers\Enums;

use App\Helpers\Enums\BaseEnum;

class Bulan extends BaseEnum
{
  const JAN = 1;
  const FEB = 2;
  const MAR = 3;
  const APR = 4;
  const MAY = 5;
  const JUN = 6;
  const JUL = 7;
  const AUG = 8;
  const SEP = 9;
  const OCT = 10;
  const NOV = 11;
  const DEC = 12;

  public static function getList()
  {
    return [
      self::JAN,
      self::FEB,
      self::MAR,
      self::APR,
      self::MAY,
      self::JUN,
      self::JUL,
      self::AUG,
      self::SEP,
      self::OCT,
      self::NOV,
      self::DEC,
    ];
  }

  public static function getString($val)
  {
    switch($val)
    {
      case self::JAN:
        return "Januari";
      case self::FEB:
        return "Pebruari";
      case self::MAR:
        return "Maret";
      case self::APR:
        return "April";
      case self::MAY:
        return "Mei";
      case self::JUN:
        return "Juni";
      case self::JUL:
        return "Juli";
      case self::AUG:
        return "Agustus";
      case self::SEP:
        return "September";
      case self::OCT:
        return "Oktober";
      case self::NOV:
        return "November";
      case self::DEC:
        return "Desember";
    }
  }

  public static function getValue($string)
  {
    switch(strtolower($string))
    {
      case "januari":
        return self::JAN;
      case "pebruari":
        return self::FEB;
      case "maret":
        return self::MAR;
      case "april":
        return self::APR;
      case "mei":
        return self::MAY;
      case "juni":
        return self::JUN;
      case "juli":
        return self::JUL;
      case "agustus":
        return self::AUG;
      case "september":
        return self::SEP;
      case "oktober":
        return self::OCT;
      case "november":
        return self::NOV;
      case "desember":
        return self::DEC;
    }
  }
}