<?php

namespace App\Notifications;

use App\Models\Ingredient;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class OverStockWarning extends Notification
{
    use Queueable;

    public $ingredient;

    public function __construct(Ingredient $ingredient)
    {
        $this->ingredient = $ingredient;
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        return [
            'ingredient_id' => $this->ingredient->id,
            'title' => 'Over Stock Warning',
            'message' => "The stock for the ingredient '{$this->ingredient->name}' is over the desired level with {$this->ingredient->remaining_amount} units remaining. Consider reducing future orders.",
        ];
    }
}
