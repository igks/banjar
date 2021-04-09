<?php

namespace App\Helpers\Enums;

use App\Helpers\Enums\BaseEnum;

class TransaksiType extends BaseEnum
{
  const CREDIT = 0;
  const DEBIT = 1;

  public static function getList()
  {
    return [
      self::CREDIT,
      self::DEBIT
    ];
  }

  public static function getString($val)
  {
    switch($val)
    {
      case self::CREDIT:
        return "KREDIT";
      case self::DEBIT:
        return "DEBET";
    }
  }

  public static function getValue($string)
  {
    switch(strtolower($string))
    {
      case "kredit":
        return self::CREDIT;
      case "debet":
        return self::DEBIT;
    }
  }
}