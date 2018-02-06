<?php

class game {

    private $grid;

    public function __construct() {
        
    }

    public function setGrid($grid) {
        $this->grid = $grid;
    }

    public function getGrid() {
        return $this->grid;
    }

    public function init($val = null) {
        if ($val) {
            $this->grid = $val;
        } else {
            $this->grid = array(
                array(0, 0, 0, 0),
                array(0, 0, 0, 0),
                array(0, 0, 0, 0),
                array(0, 0, 0, 0)
            );

            self::addVal();
            self::addVal();
        }
    }

    public function up() {
        var_export($this->grid);
        $add = false;
        for ($a = 0; $a < 4; $a++) {
            for ($i = 0; $i < 4; $i++) {
                if ($this->grid[$i][$a]) {
                    for ($j = $i + 1; $j < 4; $j++) {
                        if ($this->grid[$j][$a]) {
                            if ($this->grid[$i][$a] == $this->grid[$j][$a]) {
                                $this->grid[$i][$a] *= 2;
                                $this->grid[$j][$a] = 0;
                                $add = true;
                            }
                            break;
                        }
                    }
                }
            }
        }
        for ($a = 0; $a < 4; $a++) {
            for ($i = 0; $i < 4; $i++) {
                if (!$this->grid[$i][$a]) {
                    for ($j = $i + 1; $j < 4; $j++) {
                        if ($this->grid[$j][$a]) {
                            $this->grid[$i][$a] = $this->grid[$j][$a];
                            $this->grid[$j][$a] = 0;
                            $add = true;
                            break;
                        }
                    }
                }
            }
        }
        if ($add) {
            self::addVal();
        }
    }

    public function down() {
        $add = false;
        for ($a = 0; $a < 4; $a++) {
            for ($i = 3; $i >= 0; $i--) {
                if ($this->grid[$i][$a]) {
                    for ($j = $i - 1; $j >= 0; $j--) {
                        if ($this->grid[$j][$a]) {
                            if ($this->grid[$i][$a] == $this->grid[$j][$a]) {
                                $this->grid[$i][$a] *= 2;
                                $this->grid[$j][$a] = 0;
                                $add = true;
                            }
                            break;
                        }
                    }
                }
            }
        }
        for ($a = 0; $a < 4; $a++) {
            for ($i = 3; $i >= 0; $i--) {
                if (!$this->grid[$i][$a]) {
                    for ($j = $i - 1; $j >= 0; $j--) {
                        if ($this->grid[$j][$a]) {
                            $this->grid[$i][$a] = $this->grid[$j][$a];
                            $this->grid[$j][$a] = 0;
                            $add = true;
                            break;
                        }
                    }
                }
            }
        }
        if ($add) {
            self::addVal();
        }
    }

    public function left() {
        $add = false;
        for ($a = 0; $a < 4; $a++) {
            for ($i = 3; $i >= 0; $i--) {
                if ($this->grid[$a][$i]) {
                    for ($j = $i - 1; $j >= 0; $j--) {
                        if ($this->grid[$a][$j]) {
                            if ($this->grid[$a][$i] == $this->grid[$a][$j]) {
                                $this->grid[$a][$i] *= 2;
                                $this->grid[$a][$j] = 0;
                                $add = true;
                            }
                            break;
                        }
                    }
                }
            }
        }
        for ($a = 0; $a < 4; $a++) {
            for ($i = 3; $i >= 0; $i--) {
                if (!$this->grid[$a][$i]) {
                    for ($j = $i - 1; $j >= 0; $j--) {
                        if ($this->grid[$a][$j]) {
                            $this->grid[$a][$i] = $this->grid[$a][$j];
                            $this->grid[$a][$j] = 0;
                            $add = true;
                            break;
                        }
                    }
                }
            }
        }
        if ($add) {
            self::addVal();
        }
    }

    public function right() {
        $add = false;

        for ($a = 0; $a < 4; $a++) {
            for ($i = 0; $i < 4; $i++) {
                if ($this->grid[$a][$i]) {
                    for ($j = $i + 1; $j < 4; $j++) {
                        if ($this->grid[$a][$j]) {
                            if ($this->grid[$a][$i] == $this->grid[$a][$j]) {
                                $this->grid[$a][$i] *= 2;
                                $this->grid[$a][$j] = 0;
                                $add = true;
                            }
                            break;
                        }
                    }
                }
            }
        }
        for ($a = 0; $a < 4; $a++) {
            for ($i = 0; $i < 4; $i++) {
                if (!$this->grid[$a][$i]) {
                    for ($j = $i + 1; $j < 4; $j++) {
                        if ($this->grid[$a][$j]) {
                            $this->grid[$a][$i] = $this->grid[$a][$j];
                            $this->grid[$a][$j] = 0;
                            $add = true;
                            break;
                        }
                    }
                }
            }
        }
        if ($add) {
            self::addVal();
        }
    }

    public function addVal() {
        $a = true;
        do {
            $pos1 = mt_rand(0, 3);
            $pos2 = mt_rand(0, 3);
            $val = mt_rand(0, 200);
            if ($this->grid[$pos1][$pos2] == 0) {
                if($val < 180){
                    $this->grid[$pos1][$pos2] = 2;
                } else {
                    $this->grid[$pos1][$pos2] = 4;
                }
                $a = false;
            }
        } while ($a);
    }

}
