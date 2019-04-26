      @extends('master')
      @section('main_content')

       <div id="templatemo_content_left">

				
                <div class="templatemo_post_wrapper">
                    @foreach($published_post as $v_post)
                <div class="templatemo_post">
                  <div class="post_title"><a href="{{URL::to('/blog-details/'.$v_post->blog_id)}}">{{$v_post->blog_title}}</a>
                  	
                    </div>
                    <div class="post_info">
                    	Posted by-{{$v_post->author_name}}, {{$v_post->created_at}}
                    </div>
                    <div class="post_body">
                        <img src="<?php echo asset($v_post->blog_image)?>" alt="free css template" border="1" height="50px" width="100" />
                     <p><?php echo $v_post->blog_short_description ?></p>

                  </div>
            <!--   <div class="post_comment">
                    	<a href="#">No Comment</a>
                    </div> -->
                </div>
                
                 @endforeach
                </div> <!-- End of a post-->
               
          
                
            </div> 
            @endsection