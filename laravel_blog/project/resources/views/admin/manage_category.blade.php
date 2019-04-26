@extends('admin.admin_master')
@section('admin_main_content')

<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Category Manage</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
						  	
							  <tr>
								  <th>Category id</th>
								  <th>Category name</th>
								  <th>Category Description</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <?php
						  	foreach ($all_category_info as $vcategory) {
						  		# code...
						  	

						  	?>
						  <tbody>
							<tr>
								<td>{{$vcategory->category_id}} </td>
					
								<td class="center">{{$vcategory->category_name}}</td>
								<td class="center">{{$vcategory->category_description}}</td>
								<td class="center">
									<?php
									if($vcategory->publication_status==1)
									{

									?>
									<span class="label label-success">publish</span>
									<?php
								}
									
									else{
										?>
										<span class="label label-important">unpublish</span>


										<?php
										}
										?>
								
								</td>
								<td class="center">
									<?php
									if($vcategory->publication_status==1)
									{

									?>
									<a style =" color: #ffffff "class="btn btn-danger"href="{{URL::to('/unpublished-category/'.$vcategory->category_id)}}"><i class="icon-thumbs-down"></i></a>
										
									
									
									<?php
								}
									
									else{
										?>
									<a  style="color: #ffffff" class="btn btn-success" href="{{URL::to('/published-category/'.$vcategory->category_id)}}"><i  class="icon-thumbs-up"></i></a>
									
									<?php
										}
										?>
									
									<a class="btn btn-info" href="{{URL::to('/edit-category/'.$vcategory->category_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="{{URL::to('/delete-category/'.$vcategory->category_id)}}" onclick="return checkDelete()">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							
						  </tbody>
						  <?php
						}

						  ?>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div>
@endsection