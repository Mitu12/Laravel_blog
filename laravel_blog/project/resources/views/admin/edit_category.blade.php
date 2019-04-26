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
    			{!!Form::open(['url' => '/update-category','method'=>'post'])!!}
    				<div class="control-group">
    					
    					<lebel class="control-lebel">Category Name</lebel> 
    					<div class="controls">
    						<input type="text" name="category_name" class="span6" value="{{$category_info->category_name}}">
                            <input type="hidden" name="category_id" class="span6" value="{{$category_info->category_id}}">
    						
    					</div>
    					
    				</div>
    				<div class="control-group">
    					<lebel class="control-lebel">Category Description</lebel>
    					<div class="controls">
    						<textarea class="span6" name="category_description"rows="3" >{{$category_info->category_description}}</textarea>
    						
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
    					<button type="submit" class="btn btn-success">Update</button>
    						<button type="button" class="btn ">cancel</button>
    				</div>
    				
    			{!! Form::close() !!}
    			
    		</div>
    	
        
    </div><!--/span-->

</div>
@endsection
