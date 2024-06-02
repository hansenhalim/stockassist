<?php

namespace App\Notifications;

use App\Models\Ingredient;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class CriticalStockAlert extends Notification
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
            'message' => "Urgent: The remaining stock for the ingredient '{$this->ingredient->name}' is critically low at {$this->ingredient->remaining_amount}. Immediate action is required.",
        ];
    }
}
