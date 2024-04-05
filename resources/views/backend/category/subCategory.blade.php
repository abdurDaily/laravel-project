@extends('backend.layout.app')
@section('backend-content')
    <section id="category">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 table-responsive shadow p-2 h-100">
                    <table class="table table-hover table-striped ">
                        <tr>
                            <td style="text-align: center ">Sn</td>
                            <td>Category</td>
                            <td>Sub Category</td>
                            <td>Action</td>
                        </tr>

                        @forelse ($subCategorys as $key=>$subCategory)

                        <tr>
                            <td style="text-align: center">{{ $subCategorys->firstItem() + $key }}</td>
                            <td>
                                {{ Str::upper($subCategory->category->category_name) }}
                            </td>
                            <td>{{ Str::upper($subCategory->sub_category_slug) }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('subcategory.edit',$subCategory->id ) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{ route('subcategory.delete',$subCategory->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                </div>
                            </td>
                        </tr>
                            
                        @empty
                            
                        @endforelse
                    </table>

                    {{ $subCategorys->links() }}
                </div>

      
                <div class="col-lg-4">
                        <div class="card shadow">
                            <div class="card-header bg-primary">
                                <h4 class="text-light"> {{ request()->routeIs('subcategory.index') ? 'Add Sub Category' : 'Edit Sub Category' }} </h4>
                            </div>
                            <form action="{{ request()->routeIs('subcategory.index') ? route('subcategory.add') : route('subcategory.update', $test->id) }}" method="POST" class="p-3">
                                @csrf
                                @if (request()->routeIs('subcategory.edit'))
                                    @method( 'PUT')
                                @endif
                                <label for="category">Choose a Category</label>
                                <select name="category" id="category" class="form-control mb-2">
                                    <option value="" selected disabled>Select One</option>
                                    @foreach ($categoris as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        
                                    @endforeach
                                </select>


                                <label for="sub_category_name">Sub Category Name</label>
                                <input id="sub_category_name" value="{{ $test->sub_category ?? null }}" name="sub_category_name" type="text" class="form-control" placeholder="sub category">
                                @error('sub_category_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <button class="btn btn-primary w-100 my-2">Submit</button>
                            </form>
                        </div>
                </div>
            
                    
           
                
            </div>
        </div>
    </section>
@endsection