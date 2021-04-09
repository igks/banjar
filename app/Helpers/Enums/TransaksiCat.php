<?php

namespace App\Helpers\Enums;

use App\Helpers\Enums\BaseEnum;

class TransaksiCat extends BaseEnum
{
  const KAS = 1;
  const NYEPI = 2;
  const PIODALAN = 3;
  const BANTEN = 4;

  public static function getList()
  {
    return [
      self::KAS,
      self::NYEPI,
      self::PIODALAN,
      self::BANTEN,
    ];
  }

  public static function getString($val)
  {
    switch($val)
    {
      case self::KAS:
        return "Kas Banjar";
      case self::NYEPI:
        return "Tabungan Nyepi";
      case self::PIODALAN:
        return "Tabungan Piodalan";
      case self::BANTEN:
        return "Kas Banten";
    }
  }

  public static function getValue($string)
  {
    switch(strtolower($string))
    {
      case "kas":
        return self::KAS;
      case "nyepi":
        return self::NYEPI;
      case "piodalan":
        return self::PIODALAN;
      case "banten":
        return self::BANTEN;
    }
  }
}