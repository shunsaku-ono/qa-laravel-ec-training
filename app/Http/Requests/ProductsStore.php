<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Comparison;

class ProductsStore extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $this->purches_price;
        return [
            'product_name' => ['required','max:10'],
            'price' => ['required','integer',new Comparison($this->value)],
            'purchase_price' => ['required','integer',new Comparison($this->purchase_price)],
            'purchase_quntity' => ['required','integer'],
            'purchase_company' => ['required','max:30'],
            'purchase_date' => ['required','date','after:order_date'],
        ];
    }
}
