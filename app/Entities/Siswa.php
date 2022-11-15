<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Siswa extends Entity
{
    public function setPhoto($file)
    {
        if (!$file->getError() == 4) {
            $fileName = $file->getRandomName();
            $writePath = './uploads';
            $file->move($writePath, $fileName);
            $this->attributes['photo'] = $fileName;
            return $this;
        } else {
            $this->attributes['photo'] = 'default.png';
            return $this;
        }
    }
}
