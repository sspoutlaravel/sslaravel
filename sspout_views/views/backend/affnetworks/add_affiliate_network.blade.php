@extends('backend.layout.master')
<!-- view all categories code start here -->
@section('content')


 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Add Category
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">All Affiliate Networks</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Category</h3>
            </div>
            <!-- /.box-header -->
			

            <!-- form start -->
            {{ Form::open(array('url' => 'admin/addcategories' , 'role'=>'Form' , 'id' => 'my-form')) }}
              <div class="box-body">
                <div class="form-group {{ $errors->has('category_name') ? ' has-error' : '' }}">
                  <label for="category_name">Category Name </label>
				  <input type="text" class="form-control" name="category_name" value="{{ old('category_name') }}" id="category_name" placeholder="Category Name">
					 @if ($errors->has('category_name'))
                        <span class="help-block">
                           <strong>{{ $errors->first('category_name') }}</strong>
                        </span>
                    @endif
                </div>
				
				
				<div class="form-group {{ $errors->has('parent_id') ? ' has-error' : '' }}">
                  <label>Parent Category </label>
                  <select class="form-control" name="parent_id" value="{{ old('parent_id') }}">
				  @foreach($parent_categories as $key => $parent_category)
				  <option value="0"> {{$parent_category->category_name}} </option>  
				  @endforeach
				  
                  </select>
				   @if ($errors->has('parent_id'))
                        <span class="help-block">
                           <strong>{{ $errors->first('parent_id') }}</strong>
                        </span>
                    @endif
                </div>
				
				
                <div class="form-group {{ $errors->has('meta_title') ? ' has-error' : '' }}">
                  <label for="meta_title">Meta Title</label>
                  <input type="text" class="form-control" name="meta_title" id="meta_title" value="{{ old('meta_title') }}" placeholder="Meta title">
				  @if ($errors->has('meta_title'))
                        <span class="help-block">
                           <strong>{{ $errors->first('meta_title') }}</strong>
                        </span>
                    @endif
                </div>
				
				<div class="form-group {{ $errors->has('meta_keywords') ? ' has-error' : '' }}">
                  <label for="meta_keywords">Meta Keyword</label>
                  <input type="text" class="form-control" name="meta_keywords" value="{{ old('meta_keywords') }}" id="meta_keywords" placeholder="Meta keywords">
				  @if ($errors->has('meta_keywords'))
                        <span class="help-block">
                           <strong>{{ $errors->first('meta_keywords') }}</strong>
                        </span>
                    @endif
                </div>
				
				<div class="form-group {{ $errors->has('meta_description') ? ' has-error' : '' }}">
                  <label>Textarea</label>
                  <textarea class="form-control" rows="3" id="meta_description" value="{{ old('meta_description') }}" name="meta_description" placeholder="Enter Meta description ..."></textarea>
				  @if ($errors->has('meta_description'))
                        <span class="help-block">
                           <strong>{{ $errors->first('meta_description') }}</strong>
                        </span>
                    @endif
                </div>
				
                <div class="checkbox">
                  <label>
                    <input type="checkbox" class="iCheck-helper" value="{{ old('active') }}" name="active" id="active"> In-active
                  </label>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

          

        </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>



@endsection
<!-- view all categories code end here -->