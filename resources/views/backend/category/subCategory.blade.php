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
                            <td>Action</td>
                        </tr>
                    </table>
                </div>

      
                <div class="col-lg-4">
                        <div class="card shadow">
                            <div class="card-header bg-primary">
                                <h4 class="text-light"> Add Sub Category </h4>
                            </div>
                            <form action="" method="POST" class="p-3">
                                @csrf
                                {{-- @if (request()->routeIs('category.edit'))
                                    @method( 'PUT')
                                @endif --}}
                                <label for="category">Choose a Category</label>
                                <select name="category" id="category" class="form-control mb-2">
                                    <option value="" selected disabled>Select One</option>
                                </select>


                                <label for="sub_category_name">Sub Category Name</label>
                                <input id="sub_category_name" value="" name="sub_category_name" type="text" class="form-control" placeholder="sub category">
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