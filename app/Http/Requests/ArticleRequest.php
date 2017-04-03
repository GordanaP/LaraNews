<?php

namespace App\Http\Requests;

use App\Traits\ModelFinder;
use Carbon\Carbon;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

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
        return true;
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
                    'title' => 'required|min:5|max:80|regex:/^[a-zA-Z0-9 ]+$/|unique:articles,title',
                    'body' => 'required',
                    'category_id' =>'required|exists:categories,id',
                    'status' => 'in:0,1',
                    'published_at' => 'date|after_or_equal:today',
                    'image' => 'file|mimes:jpg,jpeg,png,gif'
                ];
                break;

            case 'PATCH':
            case 'PUT':
                return [
                    'title' => 'required|min:5|max:80|regex:/^[a-zA-Z0-9 ]+$/|unique:articles,title,'.$this->article->id,
                    'body' => 'required',
                    'category_id' =>'required|exists:categories,id',
                    'status' => 'in:0,1',
                    'published_at' => 'date|after_or_equal:today',
                    'image' => 'file|mimes:jpg,jpeg,png,gif'
                ];
                break;
        }
    }

    /**
     * Responds to the unauthorized action.
     *
     * @return \Illuminate\Http\Response
     */
    public function forbiddenResponse(){
        return response(view('welcome'), 404);
    }
}