@extends('admin.admin_master')
@section('admin_main_content')
<div class = "row-fluid">
    <div class = "span12">
    	<div class="widget green">
    		<div class="widget-title">
    			<h4>
    				<i class="icon-reorder"></i>Sample From
    			</h4>
    		
    			
    		</div>
    		</div>
    		<div class="widget-body">
    			<h3 style="color: green" align="center">
    				<?php
    					$message=Session::get('message');
    					if($message){
    						echo $message;
    						session::put('message');
    					}
    				?>

    			</h3>
    			{!!Form::open(['url' => '/save-blog','method'=>'post','enctype'=>'multipart/form-data'])!!}
    				<div class="control-group">
    					
    					<lebel class="control-lebel">Blog Title</lebel> 
    					<div class="controls">
    						<input type="text" name="blog_title" class="span6">
    						
    					</div>
    					
    				</div>

    				<div class="control-group">
    					
    					<lebel class="control-lebel">Category Name</lebel> 
    					<div class="controls">
    						<select name ="category_id" class="span6">
    							@foreach($published_category as $v_category)
    							<option value="{{$v_category->category_id}}">
    								{{$v_category->category_name}}
    							</option>
    							@endforeach
    						</select>
    						
    					</div>
    					
    				</div>
    				<div class="control-group">
    					
    					<lebel class="control-lebel">Blog Image</lebel> 
    					<div class="controls">
    						<input type="file" name="blog_image" class="span6">
    						
    					</div>
    					
    				</div>


    				<div class="control-group">
    					<lebel class="control-lebel">Blog Short Description</lebel>
    					<div class="controls">
    						<textarea class="span6" id="richTextBody"name="blog_short_description"rows="3"></textarea>
    						
    					</div>
    					
    				</div>
    				<div class="control-group">
    					<lebel class="control-lebel">Blog Long Description</lebel>
    					<div class="controls">
    						<textarea class="span6" id="richTextBody1" name="blog_long_description"rows="3"></textarea>
    						
    					</div>
    					
    				</div>
    				

    				<div class="control-group">
    					<lebel class="control-lebel">Publication status</lebel>
    					<div class="controls">
    						<select data-placeholder="Your favourite type of bear" name ="publication_status"class="chzn-select-deselect span6" tabindex="-1" id="selCSI">
    							<option value=""></option>
    							<option value="1">publish</option>
    							<option value="0">unpublish</option>

    						</select>
    					</div>
    					
    				</div>

    				<div class="form-actions">
    					<button type="submit" class="btn btn-success">Submit</button>
    						<!-- <button type="button" class="btn ">cancel</button> -->
    				</div>
    				
    			{!! Form::close() !!}
    			
    		</div>
    	
        
    </div><!--/span-->

</div>
@endsection
