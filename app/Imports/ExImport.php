<?php

namespace App\Imports;

use App\Catalog;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithValidation;

class ExImport implements ToCollection, WithValidation, SkipsOnFailure
{
    /**
     * @var array
     */
    private $data;

    use SkipsFailures;

    /**
     * ExImport constructor.
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->data = $data;
    }


    /**
     * @param Collection $rows
     */
    public function collection(Collection $rows)
    {
        $catalog = array();

        foreach ($rows as $row) {

             //the only field can be validated for being not mixed-up
                if (!is_numeric($row[7])){
                    continue;
                }

            Catalog::create(array_merge([
                'heading' => $row[1],
                'category' => $row[2],
                'producer' => $row[3],
                'name' => $row[4],
                'model' => $row[5],
                'description' => $row[6],
                'price' => $row[7],
                'guaranty' => $row[8],
                'availability' => $row[9]
            ], $this->data));


            $catalog[] = $row[1];
        }

    }

    /**
     *Checking by Model as a Unique Key
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            '5' =>  Rule::unique('catalog', 'model'),
        ];
    }

    /**
     * @return array
     */
    public function customValidationMessages()
    {
        return [
            '5.unique' => 'Duplicate'
        ];
    }
}
