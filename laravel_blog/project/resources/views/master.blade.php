<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Old Blog Template - Free CSS Layout</title>
<meta name="keywords" content="free css layout, old blog template, CSS, HTML" />
<meta name="description" content="Old Blog Template - free website template provided by TemplateMo.com" />
<link href="{{asset('public/asset/templatemo_style.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('public/css/app.css')}}" rel="stylesheet" type="text/css" />
<!--  Designed by w w w . t e m p l a t e m o . c o m  -->
<link rel="stylesheet" type="text/css" href="{{asset('public/asset/tabcontent.css')}}" />
<script type="text/javascript" src="{{asset('public/asset/tabcontent.js')}}">
/***********************************************
* Tab Content script v2.2- © Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/
</script>
</head>
<body>

	<div id="templatemo_header_panel">
    	<div id="templatemo_title_section">
				<h1>OLD BLOG</h1>
	  Your tagline goes here</div>
    </div> <!-- end of templatemo header panel -->
    
    <div id="templatemo_menu_panel">
    	<div id="templatemo_menu_section">
            <ul>
                <li><a href="{{URL::to('/')}}"  class="current">Home</a></li>
                <li><a href="{{URL::to('/gallery')}}">Gallery</a></li>
                <li><a href="{{URL::to('/categories')}}">Categories</a></li>
                <li><a href="{{URL::to('/contact')}}">Contact</a></li>  

                @guest
                <li><a href="{{URL::to('/login')}}">Login</a></li>                     
                <li><a href="{{URL::to('/register')}}">Sign up</a></li>
                @else 

                        <li>
                                <a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                @endguest
                   
            </ul> 
		</div>
    </div> <!-- end of menu -->
    
	<div id="templatemo_content_container">
        <div id="templatemo_content">
     <!-- end of content left -->

     @yield('main_content');
        
            <div id="templatemo_content_right">
            
            	<div class="templatemo_right_section">
					<div class="tag_section">
                        <ul id="countrytabs" class="shadetabs">
                                            
                            <li><a href="#" rel="category">Category Search</a></li>
                           
                        </ul>
					</div>
				
                    <div class="tabcontent_section">
                        <div id="search" class="tabcontent">
                            <form method="get" action="#">
                                <input class="inputfield" name="searchkeyword" type="text" id="searchkeyword"/>
                                <input type="submit" name="submit" class="button" value="Search" />
                            </form>                    
                        </div>
					
                        <div id="category" class="tabcontent">
                            <?php
                           $all_category= DB::table('category')
                           ->where('publication_status',1)
                           ->get();

                            ?>
                            <ul>
                                @foreach($all_category as $vcategory)
                                <li><a href="{{URL::to('/category-blog/'.$vcategory->category_id)}}">{{$vcategory->category_name}}</a></li>
                                @endforeach
                                
                            </ul>                        
                        </div>
		            
                      
					</div>

					<script type="text/javascript">
                    
                    var countries=new ddtabcontent("countrytabs")
                    countries.setpersist(true)
                    countries.setselectedClassTarget("link") //"link" or "linkparent"
                    countries.init()
                    
                    </script> <!--- end of tag -->
                </div>
            	
                
                <div class="templatemo_right_section">
                	<h2>Popular Post</h2>
                      <?php
                    $popular_post=DB::table('blog')
                    ->where('publication_status',1)
                    ->orderBy('hit_counter','desc')
                    ->limit(5)
                    ->get();

                    ?>
					<ul>
                        @foreach($popular_post as $v_post)
                        <li><a href="{{URL::to('/blog-details/'.$v_post->blog_id)}}">
                            {{$v_post->blog_title}}
                        </a>({{$v_post->hit_counter}})</li>
                        @endforeach
                    </ul>    
                </div>
                
                <div class="templatemo_right_section">
                	<h2>Recent Post</h2>
                    <?php
                    $recent_post=DB::table('blog')
                    ->orderBy('blog_id','desc')
                    ->limit(5)
                    ->get();

                    ?>
					<ul>
                        @foreach($recent_post as  $v_post)
                        <li><a href="{{URL::to('/blog-details/'.$v_post->blog_id)}}">{{$v_post->blog_title}}</a></li>
                        @endforeach
                        
                    </ul>  
                </div>
              
              
            </div> <!-- end of right content -->
	    </div> <!-- end of content -->
    </div> <!-- end of content container -->

	<div id="templatemo_bottom_panel">
    	<div id="templatemo_bottom_section">
            <div class="templatemo_bottom_section_content">
                <h3>Partner Links</h3>
                <ul>
                    <li><a href="#">Mauris congue felis at nisi</a></li>
                    <li><a href="#">Donec mattis rhoncus mi</a></li>
                    <li><a href="#">Maecenas adipiscing</a></li>
                    <li><a href="#">Nunc blandit orci</a></li>
                    <li><a href="#">Cum sociis natoque</a></li>
                </ul>
            </div>
            
            <div class="templatemo_bottom_section_content">
                <h3>Other Links</h3>
                 <ul>
                    <li><a href="#">Terms</a></li>
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">About</a></li>                 
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            
            <div class="templatemo_bottom_section_content">
                <h3>About this blog</h3>
                <p>Vivamus laoreet pharetra eros. In quam nibh, placerat ac, porta ac, molestie non, purus. Curabitur sem ante, condimentum non, cursus quis, eleifend non, libero. Nunc a nulla.</p>
                <a href="http://validator.w3.org/check?uri=referer"><img style="border:0;width:88px;height:31px" src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Transitional" width="88" height="31" vspace="8" border="0" /></a>
<a href="http://jigsaw.w3.org/css-validator/check/referer"><img style="border:0;width:88px;height:31px"  src="http://jigsaw.w3.org/css-validator/images/vcss-blue" alt="Valid CSS!" vspace="8" border="0" /></a> 
          </div>
            
        </div>
    </div> <!-- end of templatemo bottom panel -->
    
    <div id="templatemo_footer_panel">
    	<div id="templatemo_footer_section">
			Copyright © 2048 <a href="#">Your Company Name</a> | 
            <a href="http://www.iwebsitetemplate.com" target="_parent">Website Templates</a> by <a href="http://www.templatemo.com" target="_parent">Free CSS Templates</a>
        </div>
    </div>
<div align=center>This template  downloaded form <a href='http://all-free-download.com/free-website-templates/'>free website templates</a></div></body>
</html>
