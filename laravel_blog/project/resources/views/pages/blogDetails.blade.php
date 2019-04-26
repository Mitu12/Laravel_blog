      @extends('master')
      @section('main_content')

       <div id="templatemo_content_left">

				
                <div class="templatemo_post_wrapper">
                 
                <div class="templatemo_post">
                    <div class="post_title">
                    	{{$blog_info->blog_title}}</div>
                    <div class="post_info">
                    	Posted by-{{$blog_info->author_name}}, {{$blog_info->created_at}}
                    </div>
                    <div class="post_body">
                        <img src="<?php echo asset($blog_info->blog_image)?>" alt="free css template" border="1" height="50px" width="100" />
                      <p><?php echo $blog_info->blog_short_description ?></p>
                       <p><?php echo $blog_info->blog_long_description?></p>
                  </div>

                  @guest
                  <h4>
                    You need to <a href="{{URL::to('/login')}}">Login</a> for Comments
                  </h4>
                  @else
             <h3>Post your comment</h3>
             <hr/>
             <table cellpadding="30">
               <tr>
                 <td>Name</td>
                 <td>                 <input type="text" name="Comments_author_name">
</td>
               </tr>
               <tr>
                 <td>Comments</td>
                 <td>
                   <textarea rows="4" cols="30"></textarea>
                 </td>
               </tr>
               <tr>
                 <td></td>
                 <td>
                   <input type="submit" name="btn" value="Post Your Comments">
                 </td>
               </tr>
             </table>
             @endguest
                </div>
               
                </div> <!-- End of a post-->
               
          
                
            </div> 
            @endsection