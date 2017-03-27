<?php

namespace App\Http\Requests;

use App\Traits\ModelFinder;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class ArticleRequest extends FormRequest
{
    use ModelFinder;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        switch ($this->method())
        {
            case 'POST':
                return Gate::allows('create', 'App\Article');
                break;

            case 'PUT':
            case 'PATCH':
                return Gate::allows('update', $this->getArticle($this->article->id));
                break;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method())
        {
            case 'POST':
                return [
                    'title' => 'required|max:80|regex:/^[a-zA-Z0-9 ]+$/|unique:articles,title',
                    'body' => 'required',
                    'category_id' =>'required|exists:categories,id',
                    'image' => 'file|mimes:jpg,jpeg,png,gif'
                ];
                break;

            case 'PATCH':
            case 'PUT':
                return [
                    'title' => 'required|max:80|regex:/^[a-zA-Z0-9 ]+$/|unique:articles,title,'.$this->article->id,
                    'body' => 'required',
                    'category_id' =>'required|exists:categories,id',
                    'image' => 'file|mimes:jpg,jpeg,png,gif'
                ];
                break;
        }

    }
}
