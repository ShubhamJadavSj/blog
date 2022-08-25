<?php

namespace App\Traits\Livewire;

trait WithModal
{
    public $show = false;

    public function hydrateHasModal()
    {
        $className = class_basename(static::class);

        $this->listeners = array_merge($this->listeners, [
            "$className.modal.toggle" => 'toggle',
        ]);
    }

    public function toggle()
    {
        $this->show = ! $this->show;
    }

    public function open()
    {
        $this->show = true;
    }

    public function close()
    {
        $this->show = false;
    }
}
