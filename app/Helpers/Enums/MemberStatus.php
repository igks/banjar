<?php

namespace App\Helpers\Enums;

use App\Helpers\Enums\BaseEnum;

class MemberStatus extends BaseEnum
{
  const ACTIVE = 0;
  const INACTIVE = 1;

  public static function getList()
  {
    return [
      self::ACTIVE,
      self::INACTIVE
    ];
  }

  public static function getString($val)
  {
    switch($val)
    {
      case self::ACTIVE:
        return "Active";
      case self::INACTIVE:
        return "Not Active";
    }
  }

  public static function getValue($string)
  {
    switch(strtolower($string))
    {
      case "active":
        return self::ACTIVE;
      case "inactive":
        return self::INACTIVE;
    }
  }
}