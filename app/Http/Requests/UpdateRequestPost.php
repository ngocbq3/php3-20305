<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequestPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $id = $this->route('id'); //Lấy id của bài viết đang cập nhật
        return [
            'title' => ['required', 'min:6', 'max:255', 'unique:posts,title,' . $id],
            'image' => ['nullable', 'image'],
            'description'   => ['required', 'max:255'],
            'content'   => 'required|min:2',
            'category_id'   => ['required', 'integer']
        ];
    }
    public function messages() {
        return [
            'title.required' => 'Bạn cần nhập dữ liệu cho tiêu đề',
            'title.min' => 'Tiêu đề phải có ít nhất 6 ký tự',
            'title.max' => 'Tiêu đề chỉ được phép tối đa 255 ký tự',
            'title.unique' => 'Tiêu đề đã tồn tại trên hệ thống',
            'image.image' => 'File bạn chọn phải là ảnh',
            'description.required' => 'Bạn cần nhập dữ liệu cho mô tả',
            'description.max' => 'Mô tả chỉ được phép tối đa 255 ký tự',
            'content.required' => 'Bạn cần nhập dữ liệu cho nội dung',
            'content.min' => 'Nội dung phải có ít nhất 2 ký tự',
            'category_id.required' => 'Bạn cần chọn danh mục cho bài viết',
            'category_id.integer' => 'Dữ liệu bạn chọn không hợp lệ'
        ];
    }
}
