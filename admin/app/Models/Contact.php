<?php

namespace App\Models;

use App\Exceptions\Admin\Contact\PhoneException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Contact extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * @throws PhoneException
     */
    public static function formatPhone(string $phone): string
    {
        $phone = Str::replace(['+', '(', ')', ' '], '', $phone);

        if (strlen($phone) > 12 || strlen($phone) < 12) {
            throw new PhoneException('Номер телефона введен не корректно');
        }

        return '+' .$phone[0]. $phone[1] . $phone[2]
            . ' (' . $phone[3] . $phone[4] . ') '
            . $phone[5] . $phone[6] . $phone[7]
            . ' ' . $phone[8] . $phone[9] . ' '
            . $phone[10] . $phone[11];
    }
}
