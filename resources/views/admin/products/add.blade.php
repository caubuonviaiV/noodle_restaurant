@extends('admin.layout.main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
    <!-- Body: Body -->
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div
                        class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0"> {{ $title }}</h3>
                    </div>
                </div>
            </div>

            <!-- Add product-->
            <div class="modal-body">
                <div class="deadline-form">
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Tên sản phẩm</label>
                                <input type="text" name="name" value="{{ old('name') }}"class="form-control" placeholder="Nhập tên sản phẩm">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Danh mục</label>
                                <select class="form-select" name="cat_id">
                                    {{-- <option value="0"> Danh Mục Cha </option> --}}
                                    @foreach ($product_categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Giá gốc</label>
                                <input type="number" name="price" value="{{ old('price') }}" class="form-control price">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Giá giảm</label>
                                <input type="number" name="price_sale" value="{{ old('price_sale') }}" class="form-control price">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Mô tả</label>
                            <textarea class="form-control" name="description"
                            placeholder="Nội dung mô tả"> {{ old('description') }} </textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Mô tả chi tiết</label>
                            <textarea class="form-control" name="content" id="content" rows="3"
                                placeholder="Nội dung mô tả chi tiết"> {{ old('content') }} </textarea>
                        </div>

                        <div class="col-md-6">
                            <label for="menu" class="form-label"> Ảnh Sản Phẩm</label>
                            <input class="form-control" type="file" id="upload" name="file" multiple="" required="">

                            <div id="image_show">
                            </div>
                            <input type="hidden" name="thumb" id="thumb">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kích hoạt</label>
                            <div>
                                <input type="radio" id="active" value="1" name="active" checked="">
                                <label for="active" {{ (old('available') == '1') ? 'checked' : ''}}>Có</label>
                            </div>
                            <div>
                                <input type="radio" id="no_active" value="0" name="active">
                                <label for="no_active" {{ (old('available') == '0') ? 'checked' : ''}}>Không</label>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <a href="{{ route('products.index') }}" class="btn btn-secondary">Hủy</a>
                            <button type="submit" class="btn btn-primary" >Thêm sản phẩm</button>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
{{-- //priceFormat --}}
<script src="{{ asset('/teamplate/js/jquery.priceformat.min.js') }}"></script>
<script>
   $(document).ready(function() {
      $('.price').priceFormat({
        prefix: '', // Tiền tố (nếu có)
        centsSeparator: ',', // Dấu ngăn cách phần thập phân
        thousandsSeparator: '.', // Dấu ngăn cách hàng nghìn
        centsLimit: 0, // Số chữ số thập phân
        allowNegative: false // Cho phép giá trị âm hay không
      });
    });
</script>
{{-- CKEDITOR --}}
<script>
    CKEDITOR.replace('content');
</script>
@endsection
