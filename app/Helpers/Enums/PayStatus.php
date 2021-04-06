<?php

namespace App\Helpers\Enums;

use App\Helpers\Enums\BaseEnum;

class PayStatus extends BaseEnum
{
  const PAY = 0;
  const NOPAY = 1;

  public static function getList()
  {
    return [
      self::PAY,
      self::NOPAY
    ];
  }

  public static function getString($val)
  {
    switch($val)
    {
      case self::PAY:
        return "Bayar";
      case self::NOPAY:
        return "Tidak Bayar";
    }
  }

  public static function getValue($string)
  {
    switch(strtolower($string))
    {
      case "bayar":
        return self::PAY;
      case "tidak bayar":
        return self::NOPAY;
    }
  }
}