<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class UserImport implements ToCollection, ToModel
{
    private $current = 0;
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        // dd($collection);
    }

    public function model(array $row)
    {
        $this->current++;

        // $count = User::where('email', '=', $row[2]->count());

        $email = $row[2];
        $count = User::where('email', $email)->count();
        if (empty($count)) {
            if ($this->current > 1) {
                $user = new User;
                $user->name = $row[1];
                $user->email = $row[2];
                $user->password = Hash::make($row[3]);
                $user->save();
            }
        }
    }
}
