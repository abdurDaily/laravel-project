@extends('backend.layout.app')
@section('backend-content')
    <section id="category">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 table-responsive shadow p-2 h-100">
                    <table class="table table-hover table-striped ">
                        <tr>
                            <td>Sn</td>
                            <td>Category</td>
                            <td>Action</td>
                        </tr>
                        

                        @forelse ($categorys as $key=>$category)
                            <tr>
                                <td>{{ $categorys->firstItem() + $key }}</td>
                                <td>{{ Str::upper($category->category_slug) }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{ route('category.delete', $category->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            
                        @endforelse
                    </table>

                    {{ $categorys->links() }}
                </div>

      
                    <div class="col-lg-4">
                        <div class="card shadow">
                            <div class="card-header bg-primary">
                                <h4 class="text-light">Add Category</h4>
                            </div>
                            <form action="{{ request()->routeIs('category.index') ? route('category.add') : route('category.edit', $editedCategory->id) }}" method="POST" class="p-3">
                                @csrf
                                <label for="category_name">Category Name</label>
                                <input id="category_name" name="category_name" type="text" class="form-control" placeholder="category">
                                @error('category_name')
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