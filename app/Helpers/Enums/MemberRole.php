<?php

namespace App\Helpers\Enums;

use App\Helpers\Enums\BaseEnum;

class MemberRole extends BaseEnum
{
  const ISTRI = 0;
  const ANAK = 1;

  public static function getList()
  {
    return [
      self::ISTRI,
      self::ANAK
    ];
  }

  public static function getString($val)
  {
    switch($val)
    {
      case self::ISTRI:
        return "Istri";
      case self::ANAK:
        return "Anak";
    }
  }

  public static function getValue($string)
  {
    switch(strtolower($string))
    {
      case "istri":
        return self::ISTRI;
      case "anak":
        return self::ANAK;
    }
  }
}