<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMovieRequest extends FormRequest
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
            'title' => 'required|max:100',
            'year' => 'required|min:4|numeric',
            'poster' => '',
            'duration' => '',
            'genre' => 'required',
            'date' => 'date',
            'director' => '',
            'stars' => '',
            'trailer' => 'url|is_youtube_link',
            'storyline' => '',
        ];
    }
}
