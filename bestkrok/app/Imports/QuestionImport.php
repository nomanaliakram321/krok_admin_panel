<?php

namespace App\Imports;

use App\Models\Question;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class QuestionImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Question([
            'question' => $row['question'],
            'answer' => $row['answer'],
            'category_id' => $row['category_id'],

        ]);
    }
}
