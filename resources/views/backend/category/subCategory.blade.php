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

                        <tbody id="show_data">
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
                        </tbody>
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


    @push('search')
        <div class="header-search d-none d-md-flex">
            {{-- <form> --}}
                <input class="form-control py-2" type="text" name="search" id="search" placeholder="Search..." />
                
                {{-- <button><i class="lni lni-search-alt"></i></button>
            </form> --}}
        </div>
    @endpush


    @push('script')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script>
        $(function(){
            $('#search').on('keyup', function(){
                let test = $('#search').val();
                $.ajax({
                     url:  "{{ route('subcategory.ajax')}}",
                     method: "GET",
                     data:{
                        'searchName': $(this).val(),
                     },
                     success:function(responce){
                       let trs= []
                       
                       let updateUrl  = `{{ route('subcategory.edit', '::id' ) }}`
                       let deleteUrl  = `{{ route('subcategory.delete','::id') }}`
                       responce.forEach((sub,index)=>{
                        updateUrl =  updateUrl.replace('::id', sub.id)
                        deleteUrl =  deleteUrl.replace('::id', sub.id)
                        // console.log(updateUrl, sub.id);
                        let tr = `<tr>
                                <td style="text-align: center">${++index}</td>
                                <td>
                                    ${sub.category.category_name}
                                </td>
                                <td>${sub.sub_category}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="${updateUrl}" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{ route('subcategory.delete',$subCategory->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                    </div>
                                </td>
                            </tr>`;
                            trs.push(tr);
                       })
                       $('#show_data').html(trs)
                     }
                });
            })
        })
    </script>
    @endpush
@endsection