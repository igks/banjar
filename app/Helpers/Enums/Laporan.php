<?php

namespace App\Helpers\Enums;

use App\Helpers\Enums\BaseEnum;

class Laporan extends BaseEnum {
  const KAS         = 1;
  const BOP         = 2;
  const WHDI        = 3;
  const NYEPI       = 4;
  const PIODALAN    = 5;
  const BANTEN      = 6;
  const OPR         = 7;
  const ARISAN      = 8;
  const PEMBANGUNAN = 9;

  public static function getList() {
    return [
      self::KAS,
      self::BOP,
      self::WHDI,
      self::NYEPI,
      self::PIODALAN,
      self::BANTEN,
      self::OPR,
      self::ARISAN,
      self::PEMBANGUNAN,
    ];
  }

  public static function getString($val) {
    switch ($val) {
    case self::KAS:
      return "Iuran Kas";
    case self::BOP:
      return "Iuran BOP";
    case self::WHDI:
      return "Iuran WHDI";
    case self::NYEPI:
      return "Iuran Nyepi";
    case self::PIODALAN:
      return "Iuran Piodalan";
    case self::BANTEN:
      return "Iuran Banten";
    case self::OPR:
      return "Iuran Operasional";
    case self::ARISAN:
      return "Arisan";
    case self::PEMBANGUNAN:
      return "Iuran Pembangunan Pura";
    }
  }

  public static function getValue($string) {
    switch (strtolower($string)) {
    case "kas":
      return self::KAS;
    case "bop":
      return self::BOP;
    case "whdi":
      return self::WHDI;
    case "nyepi":
      return self::NYEPI;
    case "piodalan":
      return self::PIODALAN;
    case "banten":
      return self::BANTEN;
    case "operasional":
      return self::OPR;
    case "arisan":
      return self::ARISAN;
    case "pembangunan":
      return self::PEMBANGUNAN;
    }
  }
}