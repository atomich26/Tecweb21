<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Config;
use Illuminate\Foundation\Http\FormRequest;

class ProdottoRequest extends FormRequest
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
        return [
            'nome'=>'required|max:'. Config::get('strings.prodotto.nome'),
            'modello'=>'required|unique:prodotti,modello,'. $this->route('prodottoID') . '|max:' . Config::get('strings.prodotto.modello'),
            'descrizione'=>'required|max:' . Config::get('strings.prodotto.descrizione'),
            'specifiche'=>'required|max:' . Config::get('strings.prodotto.specifiche'),
            'guida_installazione'=>'nullable|max:' . Config::get('strings.prodotto.guida_installazione'),
            'note_uso'=>'nullable|max:' . Config::get('strings.prodotto.note_uso'),
            'file_img'=>'image|max:2048|nullable',
        ];
    }
}
