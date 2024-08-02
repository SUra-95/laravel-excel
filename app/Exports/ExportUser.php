<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ExportUser implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::select('*')->get();
    }

    public function map($user): array{
        return[
            $user->id,
            $user->name,
            $user->email,
            $user->created_at,
        ];
    }

    public function headings(): array{
        return[
            'ID',
            'Name',
            'Email',
            'create Date'
        ];
    }
}
